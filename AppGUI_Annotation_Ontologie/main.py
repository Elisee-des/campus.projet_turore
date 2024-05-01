from owlready2 import *
import cv2
import numpy as np

def compute_image_statistics(image_path):
    # Charger l'image
    image = cv2.imread(image_path)

    # Vérifier si l'image est chargée correctement
    if image is None:
        print("Impossible de charger l'image")
        return None

    # Convertir l'image en HSV
    hsv_image = cv2.cvtColor(image, cv2.COLOR_BGR2HSV)

    # Extraire les canaux HSV
    hue = hsv_image[:, :, 0]
    saturation = hsv_image[:, :, 1]
    value = hsv_image[:, :, 2]

    # Calculer les statistiques
    hue_mean = np.mean(hue)
    hue_std = np.std(hue)
    saturation_mean = np.mean(saturation)
    saturation_std = np.std(saturation)
    value_mean = np.mean(value)
    value_std = np.std(value)

    # Retourner les statistiques sous forme de dictionnaire
    return {
        'hue_mean': hue_mean,
        'hue_std': hue_std,
        'saturation_mean': saturation_mean,
        'saturation_std': saturation_std,
        'value_mean': value_mean,
        'value_std': value_std
    }

# Charger l'ontologie si elle existe déjà, sinon créer une nouvelle ontologie
onto = get_ontology("http://www.example.org/ontology.owl")

# Définition des classes
with onto:
    class Image(Thing):
        label = "Image"
        comment = "Class representing images."
        hole = DatatypeProperty()
        hole.label = "Hole"
        hole.comment = "Boolean property representing the presence of a hole in an image."
        color = DatatypeProperty()
        color.label = "Color"
        color.comment = "String property representing the color of an image."
        texture = DatatypeProperty()
        texture.label = "Texture"
        texture.comment = "String property representing the texture of an image."

    class Dataset(Thing):
        label = "Dataset"
        comment = "Class representing datasets."

    class Symptom(Thing):
        label = "Symptom"
        comment = "Class representing symptoms."

    class Segment(Thing):
        # Définir les propriétés fonctionnelles
        label = "Segment"
        comment = "Class representing segments."
        hue_mean = DatatypeProperty()
        hue_std = DatatypeProperty()
        saturation_mean = DatatypeProperty()
        saturation_std = DatatypeProperty()
        value_mean = DatatypeProperty()
        value_std = DatatypeProperty()
        contrast = DatatypeProperty()
        dissimilarity = DatatypeProperty()
        energy = DatatypeProperty()
        homogeneity = DatatypeProperty()
        correlation = DatatypeProperty()
        entropy = DatatypeProperty()
        aspect_ratio = DatatypeProperty()
        holes = DatatypeProperty()

    
    # Définir les classes disjointes
    Image.disjoint_with = [Dataset, Symptom, Segment]
    Dataset.disjoint_with = [Image, Symptom, Segment]
    Symptom.disjoint_with = [Image, Dataset, Segment]
    Segment.disjoint_with = [Image, Dataset, Symptom]

# Enregistrer l'ontologie dans un fichier
onto.save(file="ontology.owl")

# Calculer les statistiques de l'image et afficher le résultat
image_path = "images/1.jpg"
image_statistics = compute_image_statistics(image_path)
if image_statistics is not None:
    print("Statistiques de l'image:")
    print(image_statistics)
