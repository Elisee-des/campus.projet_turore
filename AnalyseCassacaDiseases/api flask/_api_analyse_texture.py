from flask import Flask, request, jsonify
import cv2
import numpy as np
from skimage.feature import graycomatrix, graycoprops

app = Flask(__name__)

def calculer_caracteristiques_texture(image_path):
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

@app.route('/api/caracteristiques_texture', methods=['POST'])
def api_caracteristiques_texture():
    if 'image_path' not in request.json:
        return jsonify({"error": "Veuillez fournir le chemin de l'image."}), 400
    
    image_path = request.json['image_path']
    try:
        resultats = calculer_caracteristiques_texture(image_path)
        return jsonify(resultats)
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)
