import cv2
import numpy as np
import json
from skimage.feature import graycomatrix, graycoprops
######################## La couleur ########################
# def calculer_caracteristiques_couleur(image_path):
#     # Charger l'image en utilisant OpenCV
#     image = cv2.imread(image_path)
    
#     # Convertir l'image en espace de couleur HSV
#     hsv_image = cv2.cvtColor(image, cv2.COLOR_BGR2HSV)
    
#     # Calculer les statistiques de couleur moyenne et d'écart type
#     mean, std = cv2.meanStdDev(hsv_image)
    
#     # Mettre en forme les résultats
#     hue_mean, saturation_mean, value_mean = mean.flatten()
#     hue_std, saturation_std, value_std = std.flatten()
    
#     caracteristiques_couleur = {
#         'hue_mean': hue_mean,
#         'hue_std': hue_std,
#         'saturation_mean': saturation_mean,
#         'saturation_std': saturation_std,
#         'value_mean': value_mean,
#         'value_std': value_std
#     }
    
#     return caracteristiques_couleur

# # Exemple d'utilisation
# image_path = 'images/1.jpg'
# resultats = calculer_caracteristiques_couleur(image_path)
# print("Caractéristiques de couleur :")
# # Imprimer les résultats en format JSON avec indentation
# print(json.dumps(resultats, indent=4))


######################## La Texture ########################
# def calculer_caracteristiques_texture(image_path):
#     # Charger l'image en niveaux de gris en utilisant OpenCV
#     image_gray = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
    
#     # Calculer la matrice de co-occurrence de niveaux de gris
#     distances = [1]
#     angles = [0, np.pi/4, np.pi/2, 3*np.pi/4]
#     glcm = graycomatrix(image_gray, distances=distances, angles=angles, levels=256, symmetric=True, normed=True)
    
#     # Calculer les caractéristiques de texture
#     contrast = graycoprops(glcm, 'contrast')
#     dissimilarity = graycoprops(glcm, 'dissimilarity')
#     energy = graycoprops(glcm, 'energy')
#     homogeneity = graycoprops(glcm, 'homogeneity')
#     correlation = graycoprops(glcm, 'correlation')

#     # Mettre en forme les résultats
#     caracteristiques_texture = {
#         'contraste': contrast[0][0],
#         'dissimilarite': dissimilarity[0][0],
#         'energie': energy[0][0],
#         'homogeneite': homogeneity[0][0],
#         'correlation': correlation[0][0]
#     }
    
#     return caracteristiques_texture


# # Exemple d'utilisation
# image_path = '1.jpg'
# resultats_texture = calculer_caracteristiques_texture(image_path)
# print("Caractéristiques de texture :")
# print(json.dumps(resultats_texture, indent=4))


######################## Les contour ########################
# def calculer_caracteristiques_contour(image_path):
#     # Charger l'image en niveaux de gris
#     image_gray = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
    
#     # Appliquer un seuillage pour obtenir une image binaire
#     _, thresh = cv2.threshold(image_gray, 127, 255, cv2.THRESH_BINARY)
    
#     # Trouver les contours dans l'image seuillée
#     contours, _ = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
    
#     # Si aucun contour n'est trouvé, retourner None
#     if len(contours) == 0:
#         return None
    
#     # Sélectionner le contour le plus grand (assumant qu'il s'agit du contour de l'objet principal)
#     contour = max(contours, key=cv2.contourArea)
    
#     # Calculer les caractéristiques de contour
#     surface_contour = cv2.contourArea(contour)
#     perimeter = cv2.arcLength(contour, True)
#     x, y, width, height = cv2.boundingRect(contour)
#     surface_normalisée = surface_contour / (image_gray.shape[0] * image_gray.shape[1])
#     perimeter_normalisé = perimeter / (2 * (image_gray.shape[0] + image_gray.shape[1]))
#     rapport_aspect = width / height
    
#     # Mettre en forme les résultats
#     caracteristiques_contour = {
#         'surface': surface_contour,
#         'perimetre': perimeter,
#         'largeur': width,
#         'hauteur': height,
#         'surface_normalisee': surface_normalisée,
#         'perimetre_normalise': perimeter_normalisé,
#         'rapport_aspect': rapport_aspect
#     }
    
#     return caracteristiques_contour

# # Exemple d'utilisation
# image_path = '1.jpg'
# resultats_contour = calculer_caracteristiques_contour(image_path)
# if resultats_contour:
#     print("Caractéristiques de contour :")
#     print(json.dumps(resultats_contour, indent=4))
# else:
#     print("Aucun contour trouvé dans l'image.")


######################## Les Symtômes des feuilles ########################
# def calculer_caracteristiques_symptomes_feuilles(image_path):
#     # Charger l'image en couleurs
#     image = cv2.imread(image_path)
    
#     # Convertir l'image en niveaux de gris
#     image_gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    
#     # Appliquer un seuillage pour obtenir une image binaire
#     _, thresh = cv2.threshold(image_gray, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)
    
#     # Trouver les contours dans l'image seuillée
#     contours, _ = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
    
#     # Initialiser les variables pour les caractéristiques des taches
#     nombre_taches = len(contours)
#     surface_taches = 0
#     couleur_taches = []
#     texture_taches = []  # À implémenter
    
#     # Parcourir les contours pour calculer les caractéristiques
#     for contour in contours:
#         # Calculer la surface de la tache
#         surface_tache = cv2.contourArea(contour)
#         surface_taches += surface_tache
        
#         # Calculer la couleur moyenne de la tache
#         x, y, w, h = cv2.boundingRect(contour)
#         roi = image[y:y+h, x:x+w]
#         mean_color = cv2.mean(roi)
#         couleur_taches.append(mean_color[:3])  # Ignorer l'intensité de la couleur
        
#         # Calculer la texture de la tache (à implémenter)
#         # texture_tache = calculer_texture(roi)
#         # texture_taches.append(texture_tache)
    
#     # Mettre en forme les résultats
#     caracteristiques_symptomes_feuilles = {
#         'nombre_taches': nombre_taches,
#         'surface_taches': surface_taches,
#         'couleur_taches': couleur_taches,
#         'texture_taches': texture_taches  # À remplacer avec les valeurs réelles de texture
#     }
    
#     return caracteristiques_symptomes_feuilles

# # Exemple d'utilisation
# image_path = '1.jpg'
# resultats_symptomes_feuilles = calculer_caracteristiques_symptomes_feuilles(image_path)
# print("Caractéristiques des symptômes sur les feuilles :")
# print(json.dumps(resultats_symptomes_feuilles, indent=4))


######################## Les Symtômes des feuilles ########################
# def detecter_deformations(image_racines):
#     # Convertir l'image en niveaux de gris
#     gray = cv2.cvtColor(image_racines, cv2.COLOR_BGR2GRAY)

#     # Appliquer un flou gaussien pour réduire le bruit
#     blurred = cv2.GaussianBlur(gray, (5, 5), 0)

#     # Appliquer une binarisation adaptative
#     thresh = cv2.adaptiveThreshold(blurred, 255, cv2.ADAPTIVE_THRESH_GAUSSIAN_C, cv2.THRESH_BINARY_INV, 11, 2)

#     # Trouver les contours des objets dans l'image
#     contours, _ = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

#     # Calculer la proportion de la zone déformée par rapport à la zone totale de l'image
#     area_total = gray.shape[0] * gray.shape[1]
#     area_deformed = 0
#     for contour in contours:
#         area_deformed += cv2.contourArea(contour)
    
#     proportion_deformation = area_deformed / area_total
#     return proportion_deformation

# def detecter_decolorations(image_racines):
#     # Convertir l'image en espace de couleur Lab
#     lab = cv2.cvtColor(image_racines, cv2.COLOR_BGR2Lab)

#     # Séparer les canaux de couleur Lab
#     l, a, b = cv2.split(lab)

#     # Calculer la moyenne et l'écart type du canal L (luminance)
#     l_mean, l_std = cv2.meanStdDev(l)

#     # Définir une plage de valeurs pour la luminance
#     l_low = l_mean - l_std
#     l_high = l_mean + l_std

#     # Créer un masque pour les zones décolorées
#     mask_decoloration = cv2.inRange(l, l_low, l_high)

#     # Calculer la proportion de pixels décolorés par rapport à la zone totale
#     area_total = lab.shape[0] * lab.shape[1]
#     area_decoloration = cv2.countNonZero(mask_decoloration)
#     proportion_decoloration = area_decoloration / area_total

#     return proportion_decoloration

# def analyser_texture_racines(image_racines):
#   # Charger l'image en niveaux de gris en utilisant OpenCV
#     image_gray = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
    
#     # Calculer la matrice de co-occurrence de niveaux de gris
#     distances = [1]
#     angles = [0, np.pi/4, np.pi/2, 3*np.pi/4]
#     glcm = graycomatrix(image_gray, distances=distances, angles=angles, levels=256, symmetric=True, normed=True)
    
#     # Calculer les caractéristiques de texture
#     contrast = graycoprops(glcm, 'contrast')
#     dissimilarity = graycoprops(glcm, 'dissimilarity')
#     energy = graycoprops(glcm, 'energy')
#     homogeneity = graycoprops(glcm, 'homogeneity')
#     correlation = graycoprops(glcm, 'correlation')

#     # Mettre en forme les résultats
#     caracteristiques_texture = {
#         'contraste': contrast[0][0],
#         'dissimilarite': dissimilarity[0][0],
#         'energie': energy[0][0],
#         'homogeneite': homogeneity[0][0],
#         'correlation': correlation[0][0]
#     }
    
#     return caracteristiques_texture

# def calculer_caracteristiques_symptomes_racines(image_path):
#     # Charger l'image des racines de manioc
#     image_racines = cv2.imread(image_path)
    
#     # 1. Détection des déformations des racines
#     deformation_racines = detecter_deformations(image_racines)
    
#     # 2. Détection des décolorations des racines
#     decoloration_racines = detecter_decolorations(image_racines)
    
#     # 3. Analyse de la texture des racines
#     texture_racines = analyser_texture_racines(image_racines)
    
#     # Mettre en forme les résultats
#     caracteristiques_symptomes_racines = {
#         'deformation_racines': deformation_racines,
#         'decoloration_racines': decoloration_racines,
#         'texture_racines': texture_racines
#     }
    
#     return caracteristiques_symptomes_racines

# # Exemple d'utilisation
# image_path = '1.jpg'
# resultats_symptomes_racines = calculer_caracteristiques_symptomes_racines(image_path)
# print("Caractéristiques des symptômes sur les racines :")
# print(json.dumps(resultats_symptomes_racines, indent=4))


######################## Les symptômes tiges ########################
# def detecter_lesions_tiges(image_tiges):
#     # Convertir l'image en niveaux de gris
#     gray = cv2.cvtColor(image_tiges, cv2.COLOR_BGR2GRAY)

#     # Appliquer un flou gaussien pour réduire le bruit
#     blurred = cv2.GaussianBlur(gray, (5, 5), 0)

#     # Appliquer une binarisation adaptative pour segmenter les lésions
#     _, lesions_mask = cv2.threshold(blurred, 0, 255, cv2.THRESH_BINARY_INV + cv2.THRESH_OTSU)

#     return lesions_mask

# def mesurer_longueur_largeur_lesions(lesions_mask):
#     # Trouver les contours des lésions
#     contours, _ = cv2.findContours(lesions_mask, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

#     # Initialiser les variables de longueur et largeur maximales
#     max_longueur = 0
#     max_largeur = 0

#     # Parcourir tous les contours et trouver le rectangle englobant le plus grand
#     for contour in contours:
#         x, y, w, h = cv2.boundingRect(contour)
#         if w > max_largeur:
#             max_largeur = w
#         if h > max_longueur:
#             max_longueur = h

#     return max_longueur, max_largeur

# def detecter_couleur_lesions(image_tiges, lesions_mask):
#     # Convertir l'image en espace de couleur HSV
#     hsv = cv2.cvtColor(image_tiges, cv2.COLOR_BGR2HSV)

#     # Calculer la couleur moyenne des pixels dans les zones de lésions
#     couleur_masked = cv2.bitwise_and(hsv, hsv, mask=lesions_mask)
#     h, s, v = cv2.split(couleur_masked)

#     # Calculer la couleur moyenne dans les zones de lésions
#     mean_hue = np.mean(h)
#     mean_saturation = np.mean(s)
#     mean_value = np.mean(v)

#     return mean_hue, mean_saturation, mean_value

# def calculer_caracteristiques_symptomes_tiges(image_path):
#     # Charger l'image des tiges de manioc
#     image_tiges = cv2.imread(image_path)
    
#     # 1. Détection des lésions sur les tiges
#     lesions_mask = detecter_lesions_tiges(image_tiges)
    
#     # 2. Mesure de la longueur et de la largeur des lésions
#     longueur_lesions, largeur_lesions = mesurer_longueur_largeur_lesions(lesions_mask)
    
#     # 3. Détection de la couleur moyenne des lésions
#     mean_hue, mean_saturation, mean_value = detecter_couleur_lesions(image_tiges, lesions_mask)
    
#     # Mettre en forme les résultats
#     caracteristiques_symptomes_tiges = {
#         'presence_lesions': np.any(lesions_mask),  # Indique si des lésions sont présentes
#         'longueur_lesions': longueur_lesions,
#         'largeur_lesions': largeur_lesions,
#         'couleur_lesions': [mean_hue, mean_saturation, mean_value]
#     }
    
#     return caracteristiques_symptomes_tiges

# # Exemple d'utilisation
# image_path = '1.jpg'
# resultats_symptomes_tiges = calculer_caracteristiques_symptomes_tiges(image_path)
# print("Caractéristiques des symptômes sur les tiges :")
# print(resultats_symptomes_tiges)
