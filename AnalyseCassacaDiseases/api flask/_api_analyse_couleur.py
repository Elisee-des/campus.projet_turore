from flask import Flask, request, jsonify
import cv2
import numpy as np
from skimage.feature import graycomatrix, graycoprops

app = Flask(__name__)

def calculer_caracteristiques_couleur(image_path):
    # Charger l'image en utilisant OpenCV
    image = cv2.imread(image_path)
    
    # Convertir l'image en espace de couleur HSV
    hsv_image = cv2.cvtColor(image, cv2.COLOR_BGR2HSV)
    
    # Calculer les statistiques de couleur moyenne et d'écart type
    mean, std = cv2.meanStdDev(hsv_image)
    
    # Mettre en forme les résultats
    hue_mean, saturation_mean, value_mean = mean.flatten()
    hue_std, saturation_std, value_std = std.flatten()
    
    caracteristiques_couleur = {
        'hue_mean': hue_mean,
        'hue_std': hue_std,
        'saturation_mean': saturation_mean,
        'saturation_std': saturation_std,
        'value_mean': value_mean,
        'value_std': value_std
    }
    
    return caracteristiques_couleur

@app.route('/api/caracteristiques_couleur', methods=['POST'])
def api_caracteristiques_couleur():
    if 'image_path' not in request.json:
        return jsonify({"error": "Veuillez fournir le chemin de l'image."}), 400
    
    image_path = request.json['image_path']
    try:
        resultats = calculer_caracteristiques_couleur(image_path)
        return jsonify(resultats)
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)
