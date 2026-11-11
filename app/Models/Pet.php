<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pet';
    protected $primaryKey = 'PetID';   // 🟢 important
    public $incrementing = false;      // because PetID = P001
    protected $keyType = 'string';     // because PetID is NOT integer
    public $timestamps = false; // disable if you don't have created_at/updated_at

    protected $fillable = [
        'PetID',
        'OutletID',
        'SupplierID',
        'PetName',
        'Type',
        'Breed',
        'Age',
        'Gender',
        'Color',
        'Size',
        'Price',
        'HealthStatus',
        'VaccinationStatus',
        'Description',
        'ImageURL1',
        'ImageURL2',
        'ImageURL3',
        'ImageURL4',
        'ImageURL5',
        'image_features',
    ];

    protected $casts = [
        'image_features' => 'array',
    ];

    public function purchaseItem()
    {
        return $this->hasOne(PurchaseItem::class, 'ItemID', 'PetID');
    }

    public function isSold()
    {
        return $this->purchaseItem()->exists();
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'OutletID', 'OutletID');
    }

        public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'SupplierID', 'SupplierID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'PetID', 'PetID');
    }

    // ==================== CRUD & UTILITY METHODS ====================

    // Generate next PetID
    public static function generateNextPetID($outletCode = 'A')
    {
        $lastPet = self::where('PetID', 'like', $outletCode . '%')
            ->orderBy('PetID', 'desc')
            ->first();
        if ($lastPet) {
            $number = intval(substr($lastPet->PetID, 1)) + 1;
            return $outletCode . str_pad($number, 4, '0', STR_PAD_LEFT);
        }
        return $outletCode . '0001';
    }

    // Validate attributes
    public function validate()
    {
        $errors = [];

        if (!$this->PetID) $errors[] = "Pet ID is required";
        if (!$this->PetName) $errors[] = "Pet name is required";
        if (!$this->Type) $errors[] = "Pet type is required";
        if (!$this->Breed) $errors[] = "Breed is required";
        if ($this->Age <= 0) $errors[] = "Age must be positive";
        if ($this->Price <= 0) $errors[] = "Price must be positive";
        if (!$this->HealthStatus) $errors[] = "Health status is required";
        if (!$this->VaccinationStatus) $errors[] = "Vaccination status is required";

        return $errors;
    }

    // Convert model to array (optional)
    public function toArray()
    {
        return parent::toArray();
    }

    // Handle image uploads
    public static function handleImageUploads($files, $petID)
    {
        $images = [];
        $fields = array_merge(['image'], ['extraImage1', 'extraImage2', 'extraImage3', 'extraImage4']);

        foreach ($fields as $i => $field) {
            if (isset($files[$field]) && $files[$field]->isValid()) {
                $ext = $files[$field]->getClientOriginalExtension();
                $filename = $petID . '-' . ($i + 1) . '.' . $ext;
                $path = $files[$field]->storeAs('public/pets', $filename);
                $images[] = Storage::url($path);
            } else {
                $images[] = null;
            }
        }

        return $images;
    }

    // ==================== CATEGORY METHODS ====================

    public static function addCategory($categoryName)
    {
        $categoryName = trim($categoryName);

        if (self::categoryExists($categoryName)) {
            return false;
        }

        return \DB::table('pet_categories')->insert([
            'category_name' => $categoryName,
        ]);
    }

    public static function getAllCategories()
    {
        return \DB::table('pet_categories')->select('category_name')->orderBy('category_name')->get();
    }

    // ==================== BREED DETECTION ====================
    public static function detectBreed($imagePath)
    {
        $script = base_path('ai/detect_breed.py');
        $image = realpath($imagePath);

        if (!$image || !is_file($image)) {
            return ['breed' => '', 'type' => '', 'error' => 'The uploaded image could not be found.'];
        }

        if (!is_file($script)) {
            return ['breed' => '', 'type' => '', 'error' => 'The AI breed detection script is missing.'];
        }

        $python = config('ai.python_binary', 'py');
        $pythonArgs = preg_split('/\s+/', trim((string) config('ai.python_args', '-3.11')));
        $pythonArgs = array_values(array_filter($pythonArgs, static fn ($arg) => $arg !== ''));
        $processEnvironment = [
            'PYTHONHOME' => false,
            'PYTHONPATH' => false,
            'PYTHONUSERBASE' => false,
        ];
        if (PHP_OS_FAMILY === 'Windows') {
            $windowsRoot = getenv('SystemRoot') ?: (getenv('WINDIR') ?: 'C:\\Windows');
            $systemPath = trim((string) getenv('PATH'));
            $processEnvironment['SystemRoot'] = $windowsRoot;
            $processEnvironment['WINDIR'] = $windowsRoot;
            $processEnvironment['PATH'] = ($systemPath !== '' ? rtrim($systemPath, ';') . ';' : '')
                . $windowsRoot . '\\System32;' . $windowsRoot;
        }

        try {
            $process = new \Symfony\Component\Process\Process(
                array_merge([$python], $pythonArgs, [$script, $image]),
                base_path(),
                $processEnvironment
            );
            $process->setTimeout(180);
            $process->run();

            $output = trim($process->getOutput());

            if (!$process->isSuccessful()) {
                $error = trim($process->getErrorOutput()) ?: $output ?: 'The AI process exited unexpectedly.';
                return [
                    'breed' => '',
                    'type' => '',
                    'error' => 'Breed detection could not run. ' . mb_substr($error, 0, 500),
                ];
            }

            if (str_contains($output, '|')) {
                [$breed, $type] = explode('|', $output, 2);

                if (trim($breed) !== '' && trim($type) !== '') {
                    return [
                        'breed' => trim($breed),
                        'type' => trim($type),
                    ];
                }
            }

            return [
                'breed' => '',
                'type' => '',
                'error' => 'The AI model did not return a breed prediction. Please enter the breed manually.',
            ];
        } catch (\Throwable $exception) {
            report($exception);

            return [
                'breed' => '',
                'type' => '',
                'error' => 'Breed detection is temporarily unavailable. Check the configured Python environment and AI dependencies.',
            ];
        }
    }
}
