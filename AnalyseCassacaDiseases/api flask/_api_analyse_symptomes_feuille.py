from flask import Flask, request, jsonify
import cv2
import numpy as np
from skimage.feature import graycomatrix, graycoprops

app = Flask(__name__)

def calculer_caracteristiques_symptomes_feuilles(image_path):
    # Charger l'image en couleurs
    image = cv2.imread(image_path)
    
    # Convertir l'image en niveaux de gris
    image_gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    
    # Appliquer un seuillage pour obtenir une image binaire
    _, thresh = cv2.threshold(image_gray, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)
    
    # Trouver les contours dans l'image seuillée
    contours, _ = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
    
    # Initialiser les variables pour les caractéristiques des taches
    nombre_taches = len(contours)
    surface_taches = 0
    couleur_taches = []
    texture_taches = []  # À implémenter
    
    # Parcourir les contours pour calculer les caractéristiques
    for contour in contours:
        # Calculer la surface de la tache
        surface_tache = cv2.contourArea(contour)
        surface_taches += surface_tache
        
        # Calculer la couleur moyenne de la tache
        x, y, w, h = cv2.boundingRect(contour)
        roi = image[y:y+h, x:x+w]
        mean_color = cv2.mean(roi)
        couleur_taches.append(mean_color[:3])  # Ignorer l'intensité de la couleur
        
        # Calculer la texture de la tache (à implémenter)
        # texture_tache = calculer_texture(roi)
        # texture_taches.append(texture_tache)
    
    # Mettre en forme les résultats
    caracteristiques_symptomes_feuilles = {
        'nombre_taches': nombre_taches,
        'surface_taches': surface_taches,
        'couleur_taches': couleur_taches,
        'texture_taches': texture_taches  # À remplacer avec les valeurs réelles de texture
    }
    
    return caracteristiques_symptomes_feuilles

@app.route('/api/caracteristiques_symptomes_feuilles', methods=['POST'])
def api_caracteristiques_symptomes_feuilles():
    if 'image_path' not in request.json:
        return jsonify({"error": "Veuillez fournir le chemin de l'image."}), 400
    
    image_path = request.json['image_path']
    try:
        resultats = calculer_caracteristiques_symptomes_feuilles(image_path)
        return jsonify(resultats)
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)
