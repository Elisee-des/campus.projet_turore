from owlready2 import *
import json
# Charger ou créer l'ontologie
onto = get_ontology("http://www.example.org/maladiesmaniocs.owl")

with onto:
    #Dtaset
    class Dataset(Thing):
        label = ["Dataset"]
        comment = ["Une collection de données associées."]

    class has_date_creation(DatatypeProperty):
        domain = [Dataset]
        range = [str]
        
    class has_url(DatatypeProperty):
        domain = [Dataset]
        range = [str]
        
    class has_taille(DatatypeProperty):
        domain = [Dataset]
        range = [float]
        
    class has_auteur(DatatypeProperty):
        domain = [Dataset]
        range = [str]

    # Definition
    class Definition(Dataset):
        label = "Definition"
        comment = "It characterizes the definition given to the cassava disease in question"
    
    class has_description(DatatypeProperty):
        domain = [Definition]
        range = [str]
        
    # Causes
    class Causes(Dataset):
        label = "Causes"
        comment = "It refers to the causes of the cassava disease of this class in question"

    class has_description(DatatypeProperty):
        domain = [Causes]
        range = [str]
    
    # Symptoms
    class Symptoms(Dataset):
        label = "Symptoms"
        comment = "It designates the different symptoms of the cassava disease of this class"

    class has_description(DatatypeProperty):
        domain = [Symptoms]
        range = [str]
        
    # Treatment
    class Treatment(Dataset):
        label = "Treatment"
        comment = "It designates the solutions for this class"

    class has_description(DatatypeProperty):
        domain = [Treatment]
        range = [str]

    #Image
    class Image(Dataset):
        label = "Image"
        comment = "Class representing images."
        
    class has_name(DatatypeProperty):
        domain = [Image]
        range = [str]
        
    class has_size(DatatypeProperty):
        domain = [Image]
        range = [str]

    class has_date_creation(DatatypeProperty):
        domain = [Image]
        range = [str]
            
    #### Contour ####
    class Contour(Image):
        label = ["Contour"]
        comment = ["Les caractéristiques de contour d'une image, telles que la surface, le périmètre, etc."]
        
    class has_surface(DatatypeProperty):
        domain = [Contour]
        range = [float]
        
    class has_perimetre(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_largeur(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_hauteur(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_surface_normalisee(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_perimetre_normalise(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_rapport_aspect(DatatypeProperty):
        domain = [Contour]
        range = [float]

    
    
    #### Couleur ####
    class Couleur(Image):
        label = ["Couleur"]
        comment = ["Les caractéristiques de couleur d'une image, telles que la teinte, la saturation et la valeur."]

    class has_hue_mean(DatatypeProperty):
        domain = [Couleur]
        range = [float]

    class has_hue_std(DatatypeProperty):
        domain = [Couleur]
        range = [float]

    class has_saturation_mean(DatatypeProperty):
        domain = [Couleur]
        range = [float]
        
    class has_saturation_std(DatatypeProperty):
        domain = [Couleur]
        range = [float]
        
    class has_value_mean(DatatypeProperty):
        domain = [Couleur]
        range = [float]
        
    class has_value_std(DatatypeProperty):
        domain = [Couleur]
        range = [float]
        
        
    #### Texture ####
    class Texture(Image):
        label = ["Texture"]
        comment = ["Les caractéristiques de texture d'une image, telles que le contraste, la dissimilarité, etc."]

    class has_contraste(DatatypeProperty):
        domain = [Texture]
        range = [float]
        
    class has_dissimilarite(DatatypeProperty):
        domain = [Texture]
        range = [float]

    class has_energie(DatatypeProperty):
        domain = [Texture]
        range = [float]

    class has_homogeneite(DatatypeProperty):
        domain = [Texture]
        range = [float]

    class has_correlation(DatatypeProperty):
        domain = [Texture]
        range = [float]


    #### Symptomes racines ####
    class SymptomesRacines(Image):
        label = ["Symptômes sur les racines"]
        comment = ["Les symptômes observés sur les racines d'une plante, comme les déformations, la décoloration, etc."]

    class has_deformation_racines(DatatypeProperty):
        domain = [SymptomesRacines]
        range = [float]

    class has_decoloration_racines(DatatypeProperty):
        domain = [SymptomesRacines]
        range = [float]

    class has_contraste(DatatypeProperty):
        domain = [SymptomesRacines]
        range = [float]


    class has_dissimilarite(DatatypeProperty):
        domain = [SymptomesRacines]
        range = [float]


    class has_energie(DatatypeProperty):
        domain = [SymptomesRacines]
        range = [float]


    class has_homogeneite(DatatypeProperty):
        domain = [SymptomesRacines]
        range = [float]


    class has_correlation(DatatypeProperty):
        domain = [SymptomesRacines]
        range = [float]


    #### Symptomes feuilles ####
    class SymptomesFeuilles(Image):
        label = ["Symptômes sur les feuilles"]
        comment = ["Les symptômes observés sur les feuilles d'une plante, comme les taches, la décoloration, etc."]

    class has_nombre_taches(DatatypeProperty):
        domain = [SymptomesFeuilles]
        range = [float]

    class has_surface_taches(DatatypeProperty):
        domain = [SymptomesFeuilles]
        range = [float]

    class has_couleur_taches(DatatypeProperty):
        domain = [SymptomesFeuilles]
        range = [float]

    class has_texture_taches(DatatypeProperty):
        domain = [SymptomesFeuilles]
        range = [float]
    
    
    #### Symptomes tiges ####
    class SymptomesTiges(Image):
        label = ["Symptômes sur les tiges"]
        comment = ["Les symptômes observés sur les tiges d'une plante, comme les lésions, la déformation, etc."]
            
    class has_presence_lesions(DatatypeProperty):
        domain = [SymptomesTiges]
        range = [float]
            
    class has_longueur_lesions(DatatypeProperty):
        domain = [SymptomesTiges]
        range = [float]

    class has_largeur_lesions(DatatypeProperty):
        domain = [SymptomesTiges]
        range = [float]

    class has_mean_hue(DatatypeProperty):
        domain = [SymptomesTiges]
        range = [float]
            
    class has_mean_saturation(DatatypeProperty):
        domain = [SymptomesTiges]
        range = [float]
            
    class has_mean_value(DatatypeProperty):
        domain = [SymptomesTiges]
        range = [float]

onto.save(file="mainOnto.owl")


with onto:
    # Créer une instance de Dataset
    dataset_instance = Dataset("dataset_cassaca_diseases")
    dataset_instance.has_date_creation.append("2024-05-10")
    dataset_instance.has_url.append("http://www.example.com/dataset")
    dataset_instance.has_taille.append(1024.5)
    dataset_instance.has_auteur.append("Sabidani Yentem Elisée")

    # Créer une instance d'Image liée au Dataset
    image_instance = Image("1-bacteria-disease.jpg")

    # Spécifier d'autres propriétés pour chaque propriété d'image
    
    # Attribuer les caractéristiques de couleur à l'image
    image_instance.has_hue_mean.append(120.0) 
    image_instance.has_hue_std.append(10.0)
    image_instance.has_saturation_mean.append(0.8)
    image_instance.has_saturation_std.append(0.1)
    image_instance.has_value_mean.append(0.6)
    image_instance.has_value_std.append(0.05)

    # Attribuer les caractéristiques de texture à l'image
    image_instance.has_contraste.append(0.5)
    image_instance.has_dissimilarite.append(0.3)
    image_instance.has_energie.append(0.7)
    image_instance.has_homogeneite.append(0.4)
    image_instance.has_correlation.append(0.6)

    # Attribuer les symptômes des feuilles à l'image
    image_instance.has_nombre_taches.append(10)
    image_instance.has_surface_taches.append(50.0)
    image_instance.has_couleur_taches.append(90.0)
    image_instance.has_texture_taches.append(0.25)

    # Attribuer les symptômes des racines à l'image
    image_instance.has_deformation_racines.append(0.1)
    image_instance.has_decoloration_racines.append(0.2)

    # Attribuer les symptômes des tiges à l'image
    image_instance.has_presence_lesions.append(1)
    image_instance.has_longueur_lesions.append(20.0)
    image_instance.has_largeur_lesions.append(5.0)
    image_instance.has_mean_hue.append(110.0)
    image_instance.has_mean_saturation.append(0.7)
    image_instance.has_mean_value.append(0.8)
    
    
    # Sauvegarder l'ontologie
onto.save(file="mainOnto.owl")


# Créer une liste pour stocker les valeurs des propriétés de Dataset
dataset_properties = []

# Parcourir les instances de Dataset et récupérer les valeurs associées à chaque propriété
for dataset in onto.Dataset.instances():
    dataset_property = {}
    dataset_property['date_creation'] = dataset.has_date_creation[0] if dataset.has_date_creation else None
    dataset_property['url'] = dataset.has_url[0] if dataset.has_url else None
    dataset_property['taille'] = dataset.has_taille[0] if dataset.has_taille else None
    dataset_property['auteur'] = dataset.has_auteur[0] if dataset.has_auteur else None
    dataset_properties.append(dataset_property)

# Afficher les valeurs récupérées pour chaque propriété de Dataset
print("Dataset Properties:", json.dumps(dataset_properties, indent=4))


# Créer une liste pour stocker les valeurs des propriétés de Image
image_properties = []

# Parcourir les instances de Image et récupérer les valeurs associées à chaque propriété
for image in onto.Image.instances():
    image_property = {}
    image_property['hue_mean'] = image.has_hue_mean[0] if image.has_hue_mean else None
    image_property['hue_std'] = image.has_hue_std[0] if image.has_hue_std else None
    image_property['saturation_mean'] = image.has_saturation_mean[0] if image.has_saturation_mean else None
    image_property['saturation_std'] = image.has_saturation_std[0] if image.has_saturation_std else None
    image_property['value_mean'] = image.has_value_mean[0] if image.has_value_mean else None
    image_property['value_std'] = image.has_value_std[0] if image.has_value_std else None
    image_property['contraste'] = image.has_contraste[0] if image.has_contraste else None
    image_property['dissimilarite'] = image.has_dissimilarite[0] if image.has_dissimilarite else None
    image_property['energie'] = image.has_energie[0] if image.has_energie else None
    image_property['homogeneite'] = image.has_homogeneite[0] if image.has_homogeneite else None
    image_property['correlation'] = image.has_correlation[0] if image.has_correlation else None
    image_property['nombre_taches'] = image.has_nombre_taches[0] if image.has_nombre_taches else None
    image_property['surface_taches'] = image.has_surface_taches[0] if image.has_surface_taches else None
    image_property['couleur_taches'] = image.has_couleur_taches[0] if image.has_couleur_taches else None
    image_property['texture_taches'] = image.has_texture_taches[0] if image.has_texture_taches else None
    image_property['deformation_racines'] = image.has_deformation_racines[0] if image.has_deformation_racines else None
    image_property['decoloration_racines'] = image.has_decoloration_racines[0] if image.has_decoloration_racines else None
    image_property['presence_lesions'] = image.has_presence_lesions[0] if image.has_presence_lesions else None
    image_property['longueur_lesions'] = image.has_longueur_lesions[0] if image.has_longueur_lesions else None
    image_property['largeur_lesions'] = image.has_largeur_lesions[0] if image.has_largeur_lesions else None
    image_property['mean_hue'] = image.has_mean_hue[0] if image.has_mean_hue else None
    image_property['mean_saturation'] = image.has_mean_saturation[0] if image.has_mean_saturation else None
    image_property['mean_value'] = image.has_mean_value[0] if image.has_mean_value else None
    image_properties.append(image_property)

# Afficher les valeurs récupérées pour chaque propriété de Image
print("Image Properties:",  json.dumps(image_properties, indent=4))

# # Afficher toutes les classes dans l'ontologie
# print(list(onto.classes()))

# # Afficher toutes les propriétés dans l'ontologie
# print(list(onto.properties()))