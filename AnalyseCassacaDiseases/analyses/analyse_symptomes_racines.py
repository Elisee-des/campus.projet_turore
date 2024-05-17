import cv2
import numpy as np
import json
from skimage.feature import graycomatrix, graycoprops

######################## Les Symtômes des racines ########################
def detecter_deformations(image_racines):
    # Convertir l'image en niveaux de gris
    gray = cv2.cvtColor(image_racines, cv2.COLOR_BGR2GRAY)

    # Appliquer un flou gaussien pour réduire le bruit
    blurred = cv2.GaussianBlur(gray, (5, 5), 0)

    # Appliquer une binarisation adaptative
    thresh = cv2.adaptiveThreshold(blurred, 255, cv2.ADAPTIVE_THRESH_GAUSSIAN_C, cv2.THRESH_BINARY_INV, 11, 2)

    # Trouver les contours des objets dans l'image
    contours, _ = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

    # Calculer la proportion de la zone déformée par rapport à la zone totale de l'image
    area_total = gray.shape[0] * gray.shape[1]
    area_deformed = 0
    for contour in contours:
        area_deformed += cv2.contourArea(contour)
    
    proportion_deformation = area_deformed / area_total
    return proportion_deformation

def detecter_decolorations(image_racines):
    # Convertir l'image en espace de couleur Lab
    lab = cv2.cvtColor(image_racines, cv2.COLOR_BGR2Lab)

    # Séparer les canaux de couleur Lab
    l, a, b = cv2.split(lab)

    # Calculer la moyenne et l'écart type du canal L (luminance)
    l_mean, l_std = cv2.meanStdDev(l)

    # Définir une plage de valeurs pour la luminance
    l_low = l_mean - l_std
    l_high = l_mean + l_std

    # Créer un masque pour les zones décolorées
    mask_decoloration = cv2.inRange(l, l_low, l_high)

    # Calculer la proportion de pixels décolorés par rapport à la zone totale
    area_total = lab.shape[0] * lab.shape[1]
    area_decoloration = cv2.countNonZero(mask_decoloration)
    proportion_decoloration = area_decoloration / area_total

    return proportion_decoloration

def analyser_texture_racines(image_racines):
  # Charger l'image en niveaux de gris en utilisant OpenCV
    image_gray = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
    
    # Calculer la matrice de co-occurrence de niveaux de gris
    distances = [1]
    angles = [0, np.pi/4, np.pi/2, 3*np.pi/4]
    glcm = graycomatrix(image_gray, distances=distances, angles=angles, levels=256, symmetric=True, normed=True)
    
    # Calculer les caractéristiques de texture
    contrast = graycoprops(glcm, 'contrast')
    dissimilarity = graycoprops(glcm, 'dissimilarity')
    energy = graycoprops(glcm, 'energy')
    homogeneity = graycoprops(glcm, 'homogeneity')
    correlation = graycoprops(glcm, 'correlation')

    # Mettre en forme les résultats
    caracteristiques_texture = {
        'contraste': contrast[0][0],
        'dissimilarite': dissimilarity[0][0],
        'energie': energy[0][0],
        'homogeneite': homogeneity[0][0],
        'correlation': correlation[0][0]
    }
    
    return caracteristiques_texture

def calculer_caracteristiques_symptomes_racines(image_path):
    # Charger l'image des racines de manioc
    image_racines = cv2.imread(image_path)
    
    # 1. Détection des déformations des racines
    deformation_racines = detecter_deformations(image_racines)
    
    # 2. Détection des décolorations des racines
    decoloration_racines = detecter_decolorations(image_racines)
    
    # 3. Analyse de la texture des racines
    texture_racines = analyser_texture_racines(image_racines)
    
    # Mettre en forme les résultats
    caracteristiques_symptomes_racines = {
        'deformation_racines': deformation_racines,
        'decoloration_racines': decoloration_racines,
        'texture_racines': texture_racines
    }
    
    return caracteristiques_symptomes_racines

# Exemple d'utilisation
image_path = '1.jpg'
resultats_symptomes_racines = calculer_caracteristiques_symptomes_racines(image_path)
print("Caractéristiques des symptômes sur les racines :")
print(json.dumps(resultats_symptomes_racines, indent=4))
