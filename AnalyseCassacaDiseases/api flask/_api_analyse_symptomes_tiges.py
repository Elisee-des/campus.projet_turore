from flask import Flask, request, jsonify
import cv2
import numpy as np
from skimage.feature import graycomatrix, graycoprops

app = Flask(__name__)

def detecter_lesions_tiges(image_tiges):
    # Convertir l'image en niveaux de gris
    gray = cv2.cvtColor(image_tiges, cv2.COLOR_BGR2GRAY)

    # Appliquer un flou gaussien pour réduire le bruit
    blurred = cv2.GaussianBlur(gray, (5, 5), 0)

    # Appliquer une binarisation adaptative pour segmenter les lésions
    _, lesions_mask = cv2.threshold(blurred, 0, 255, cv2.THRESH_BINARY_INV + cv2.THRESH_OTSU)

    return lesions_mask

def mesurer_longueur_largeur_lesions(lesions_mask):
    # Trouver les contours des lésions
    contours, _ = cv2.findContours(lesions_mask, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

    # Initialiser les variables de longueur et largeur maximales
    max_longueur = 0
    max_largeur = 0

    # Parcourir tous les contours et trouver le rectangle englobant le plus grand
    for contour in contours:
        x, y, w, h = cv2.boundingRect(contour)
        if w > max_largeur:
            max_largeur = w
        if h > max_longueur:
            max_longueur = h

    return max_longueur, max_largeur

def detecter_couleur_lesions(image_tiges, lesions_mask):
    # Convertir l'image en espace de couleur HSV
    hsv = cv2.cvtColor(image_tiges, cv2.COLOR_BGR2HSV)

    # Calculer la couleur moyenne des pixels dans les zones de lésions
    couleur_masked = cv2.bitwise_and(hsv, hsv, mask=lesions_mask)
    h, s, v = cv2.split(couleur_masked)

    # Calculer la couleur moyenne dans les zones de lésions
    mean_hue = np.mean(h)
    mean_saturation = np.mean(s)
    mean_value = np.mean(v)

    return mean_hue, mean_saturation, mean_value

def calculer_caracteristiques_symptomes_tiges(image_path):
    # Charger l'image des tiges de manioc
    image_tiges = cv2.imread(image_path)
    
    # 1. Détection des lésions sur les tiges
    lesions_mask = detecter_lesions_tiges(image_tiges)
    
    # 2. Mesure de la longueur et de la largeur des lésions
    longueur_lesions, largeur_lesions = mesurer_longueur_largeur_lesions(lesions_mask)
    
    # 3. Détection de la couleur moyenne des lésions
    mean_hue, mean_saturation, mean_value = detecter_couleur_lesions(image_tiges, lesions_mask)
    
    # Mettre en forme les résultats
    caracteristiques_symptomes_tiges = {
        'presence_lesions': bool(np.any(lesions_mask)),  # Indique si des lésions sont présentes
        'longueur_lesions': longueur_lesions,
        'largeur_lesions': largeur_lesions,
        'couleur_lesions': {
            'mean_hue': mean_hue,
            'mean_saturation': mean_saturation,
            'mean_value': mean_value
        }
    }
    
    return caracteristiques_symptomes_tiges

@app.route('/api/caracteristiques_symptomes_tiges', methods=['POST'])
def api_caracteristiques_symptomes_tiges():
    if 'image_path' not in request.json:
        return jsonify({"error": "Veuillez fournir le chemin de l'image."}), 400
    
    image_path = request.json['image_path']
    try:
        resultats = calculer_caracteristiques_symptomes_tiges(image_path)
        return jsonify(resultats)
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)
