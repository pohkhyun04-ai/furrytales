#!/usr/bin/env python
"""Classify an uploaded pet image and print: breed|pet_type."""

import os
os.environ.setdefault("TF_CPP_MIN_LOG_LEVEL", "3")

import sys
import warnings
warnings.filterwarnings("ignore")


def map_to_pet_type(breed_label):
    label = breed_label.lower().replace("_", " ").replace("-", " ")

    if any(word in label for word in (
        "dog", "retriever", "terrier", "shepherd", "poodle", "husky",
        "spaniel", "beagle", "bulldog", "chihuahua", "collie", "dachshund",
        "doberman", "maltese", "rottweiler", "schnauzer", "shih tzu",
        "pug", "samoyed", "wolfhound"
    )):
        return "Dog"
    if any(word in label for word in (
        "cat", "kitten", "persian", "siamese", "tabby", "egyptian cat"
    )):
        return "Cat"
    if any(word in label for word in ("rabbit", "hare")):
        return "Rabbit"
    if any(word in label for word in ("hamster", "guinea pig", "mouse", "rat", "gerbil")):
        return "Hamster"
    if any(word in label for word in ("bird", "parrot", "sparrow", "macaw", "cockatoo", "finch")):
        return "Bird"
    if any(word in label for word in ("turtle", "tortoise", "iguana", "lizard", "snake", "gecko")):
        return "Reptile"
    return "Other"


def main():
    if len(sys.argv) < 2:
        raise ValueError("Image path was not provided.")

    # Load asyncio before TensorFlow's test/distribution imports on Windows.
    import asyncio  # noqa: F401
    import cv2
    import numpy as np
    import tensorflow as tf
    from tensorflow.keras.applications.resnet50 import (
        ResNet50,
        decode_predictions,
        preprocess_input,
    )

    tf.get_logger().setLevel("ERROR")

    image_path = sys.argv[1]
    image_bytes = np.fromfile(image_path, dtype=np.uint8)
    image = cv2.imdecode(image_bytes, cv2.IMREAD_COLOR)

    if image is None:
        raise ValueError("The uploaded file is not a supported image.")

    image = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
    image = cv2.resize(image, (224, 224), interpolation=cv2.INTER_AREA)
    batch = np.expand_dims(image.astype(np.float32), axis=0)
    batch = preprocess_input(batch)

    model = ResNet50(weights="imagenet")
    predictions = model.predict(batch, verbose=0)
    breed_label = decode_predictions(predictions, top=1)[0][0][1]
    breed = breed_label.replace("_", " ").title()
    pet_type = map_to_pet_type(breed_label)

    print(f"{breed}|{pet_type}", flush=True)


if __name__ == "__main__":
    try:
        main()
    except Exception as error:
        print(f"Pet breed detector error: {error}", file=sys.stderr, flush=True)
        sys.exit(1)
