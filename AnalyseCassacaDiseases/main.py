from owlready2 import *
import cv2
import numpy as np
import json
from skimage.feature import graycomatrix, graycoprops

# Charger l'ontologie si elle existe déjà, sinon créer une nouvelle ontologie
onto = get_ontology("http://www.example.org/ontology.owl")

# Définition des classes
# with onto:
#     class Image(Thing):
#         label = "Image"
#         comment = "Class representing images."
#         hole = DatatypeProperty()
#         hole.label = "Hole"
#         hole.comment = "Boolean property representing the presence of a hole in an image."
#         color = DatatypeProperty()
#         color.label = "Color"
#         color.comment = "String property representing the color of an image."
#         texture = DatatypeProperty()
#         texture.label = "Texture"
#         texture.comment = "String property representing the texture of an image."

#     class Dataset(Thing):
#         label = "Dataset"
#         comment = "Class representing datasets."

#     class Symptom(Thing):
#         label = "Symptom"
#         comment = "Class representing symptoms."

#     class Segment(Thing):
#         # Définir les propriétés fonctionnelles
#         label = "Segment"
#         comment = "Class representing segments."
#         hue_mean = DatatypeProperty()
#         hue_std = DatatypeProperty()
#         saturation_mean = DatatypeProperty()
#         saturation_std = DatatypeProperty()
#         value_mean = DatatypeProperty()
#         value_std = DatatypeProperty()
#         contrast = DatatypeProperty()
#         dissimilarity = DatatypeProperty()
#         energy = DatatypeProperty()
#         homogeneity = DatatypeProperty()
#         correlation = DatatypeProperty()
#         entropy = DatatypeProperty()
#         aspect_ratio = DatatypeProperty()
#         holes = DatatypeProperty()

    
#     # Définir les classes disjointes
#     Image.disjoint_with = [Dataset, Symptom, Segment]
#     Dataset.disjoint_with = [Image, Symptom, Segment]
#     Symptom.disjoint_with = [Image, Dataset, Segment]
#     Segment.disjoint_with = [Image, Dataset, Symptom]


with onto:
    class Drug(Thing):
        pass
    class Ingredient(Thing):
        pass
    class has_for_ingredient(ObjectProperty):
        domain    = [Drug]
        range     = [Ingredient]

# Enregistrer l'ontologie dans un fichier
onto.save(file="ontology.owl")

# Afficher toutes les classes dans l'ontologie
print(list(onto.classes()))

# Afficher toutes les propriétés dans l'ontologie
print(list(onto.properties()))



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

    # Calculer les statistiques de couleur
    hue_mean = np.mean(hue)
    hue_std = np.std(hue)
    saturation_mean = np.mean(saturation)
    saturation_std = np.std(saturation)
    value_mean = np.mean(value)
    value_std = np.std(value)
    
    # Extraction des caractéristiques de texture
    gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    distance = [1]  # Spécifie la distance entre les pixels
    angles = [0, np.pi/4, np.pi/2, 3*np.pi/4]  # Spécifie l'angle pour la mesure de texture
    levels = 256  # Niveau de gris

    # Calcul de la matrice GLCM
    glcm = graycomatrix(gray_image, distances=distance, angles=angles, levels=levels, symmetric=True, normed=True)

    # Extraction des caractéristiques de texture à partir de GLCM
    properties = ['contrast', 'dissimilarity', 'energy', 'homogeneity', 'correlation']
    texture_features = {}
    for prop in properties:
        texture_features[prop] = graycoprops(glcm, prop).mean()

    # Calcul de l'entropie
    entropy = -np.sum(glcm * np.log2(glcm + np.finfo(float).eps))

    # Ajout de l'entropie aux caractéristiques de texture
    texture_features['entropy'] = entropy
    
    # Calcul des caractéristiques de taille des contours
    # gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    # up = 1
    # low = 255
    # ret, thresh = cv2.threshold(gray, low, up, cv2.THRESH_BINARY)
    # contours, _ = cv2.findContours(thresh, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)
    # largest_contour = max(contours, key=cv2.contourArea)
    # contour_area = cv2.contourArea(largest_contour)
    # perimeter = cv2.arcLength(largest_contour, True)
    # width, height = cv2.boundingRect(largest_contour)[2:]

    # Normalisation des caractéristiques de taille
    # h1, w1, _ = image.shape
    # normalized_area = contour_area / (w1 * h1)
    # normalized_perimeter = perimeter / (w1 + h1)
    # aspect_ratio = width / height
    
    # Retourner les statistiques sous forme de dictionnaire
    return {
        'couleur': {
            'hue_mean': hue_mean,
            'hue_std': hue_std,
            'saturation_mean': saturation_mean,
            'saturation_std': saturation_std,
            'value_mean': value_mean,
            'value_std': value_std
        },
        'texture': texture_features,
        'contour': {
            'area': contour_area,
            'perimeter': perimeter,
            'width': width,
            'height': height,
            'normalized_area': normalized_area,
            'normalized_perimeter': normalized_perimeter,
            'aspect_ratio': aspect_ratio
        }
    }

# Calculer les statistiques de l'image
image_path = "images/1.jpg"
image_statistics = compute_image_statistics(image_path)

# # Afficher l'extration des caractéristiques de l'image au format JSON
# if image_statistics is not None:
#     print("Extraction des caractéristiques de la couleur, de la texture et des contours:")
#     print(json.dumps(image_statistics, indent=4))

