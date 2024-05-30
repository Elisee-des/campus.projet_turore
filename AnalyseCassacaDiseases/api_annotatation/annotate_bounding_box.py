# from flask import Flask, request, jsonify
# import cv2
# import numpy as np
# import base64

# app = Flask(__name__)

# @app.route('/')
# def index():
#     return '''
#     <h1>Annotation API: Bounding Boxes</h1>
#     <p>Send a POST request with JSON containing 'image' field.</p>
#     '''

# @app.route('/annotate_bounding_box', methods=['POST'])
# def annotate_bounding_box():
#     data = request.json
#     if 'image' in data:
#         image_data = data['image']
#         # Decode base64 image
#         image_bytes = base64.b64decode(image_data.split(",")[1])
#         image_cv = cv2.imdecode(np.frombuffer(image_bytes, dtype=np.uint8), cv2.IMREAD_COLOR)
#         annotated_image = annotate_bounding_box(image_cv)
#         return send_annotated_image(annotated_image)
#     else:
#         return jsonify({'error': 'No image provided'})

# def annotate_bounding_box(image):
#     # Example bounding box (x, y, width, height)
#     x, y, w, h = 50, 50, 100, 100
#     cv2.rectangle(image, (x, y), (x + w, y + h), (0, 255, 0), 2)
#     return image

# def send_annotated_image(image):
#     _, buffer = cv2.imencode('.jpg', image)
#     return base64.b64encode(buffer).decode('utf-8')

# if __name__ == '__main__':
#     app.run(debug=True)
from flask import Flask, request, send_file
import cv2
import numpy as np
import base64
import io

app = Flask(__name__)

@app.route('/')
def index():
    return '''
    <h1>Annotation API: Bounding Boxes</h1>
    <p>Send a POST request with JSON containing 'image' field encoded in base64.</p>
    '''

@app.route('/annotate_bounding_box', methods=['POST'])
def annotate_bounding_box():
    data = request.json
    if 'image' in data:
        image_data = data['image']
        # Decode base64 image
        image_bytes = base64.b64decode(image_data)
        image_cv = cv2.imdecode(np.frombuffer(image_bytes, dtype=np.uint8), cv2.IMREAD_COLOR)
        
        # Debugging: Log image shape
        print("Image shape:", image_cv.shape)
        
        annotated_image = annotate_bounding_box(image_cv)
        
        # Debugging: Log annotated image shape
        print("Annotated image shape:", annotated_image.shape)
        
        return send_annotated_image(annotated_image)
    else:
        return {'error': 'No image provided'}

def annotate_bounding_box(image):
    # Example bounding box (x, y, width, height)
    x, y, w, h = 40, 40, 200, 200
    cv2.rectangle(image, (x, y), (x + w, y + h), (0, 255, 0), 2)
    return image

def send_annotated_image(image):
    _, buffer = cv2.imencode('.jpg', image)
    img_io = io.BytesIO(buffer)
    img_io.seek(0)
    return send_file(img_io, mimetype='image/jpeg')

if __name__ == '__main__':
    app.run(debug=True)
