from owlready2 import *
import json

# Load or create the ontology
onto = get_ontology("http://www.example.org/maladiesmaniocs.owl")

with onto:
    # Dataset
    class Dataset(Thing):
        label = ["Dataset"]
        comment = ["A collection of associated data."]

    class has_creation_date(DatatypeProperty):
        domain = [Dataset]
        range = [str]
        
    class has_url(DatatypeProperty):
        domain = [Dataset]
        range = [str]
        
    class has_size(DatatypeProperty):
        domain = [Dataset]
        range = [float]
        
    class has_author(DatatypeProperty):
        domain = [Dataset]
        range = [str]

    # Image
    class Image(Dataset):
        label = "Image"
        comment = "Class representing images."
        
    class has_size(DatatypeProperty):
        domain = [Image]
        range = [float]

    class has_creation_date(DatatypeProperty):
        domain = [Dataset]
        range = [str]

    #### Contour ####
    class Contour(Image):
        label = ["Contour"]
        comment = ["The contour characteristics of an image, such as area, perimeter, etc."]
        
    class has_area(DatatypeProperty):
        domain = [Contour]
        range = [float]
        
    class has_perimeter(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_width(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_height(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_normalized_area(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_normalized_perimeter(DatatypeProperty):
        domain = [Contour]
        range = [float]

    class has_aspect_ratio(DatatypeProperty):
        domain = [Contour]
        range = [float]

    #### Color ####
    class Color(Image):
        label = ["Color"]
        comment = ["The color characteristics of an image, such as hue, saturation, and value."]

    class has_hue_mean(DatatypeProperty):
        domain = [Color]
        range = [float]

    class has_hue_std(DatatypeProperty):
        domain = [Color]
        range = [float]

    class has_saturation_mean(DatatypeProperty):
        domain = [Color]
        range = [float]
        
    class has_saturation_std(DatatypeProperty):
        domain = [Color]
        range = [float]
        
    class has_value_mean(DatatypeProperty):
        domain = [Color]
        range = [float]
        
    class has_value_std(DatatypeProperty):
        domain = [Color]
        range = [float]

    #### Texture ####
    class Texture(Image):
        label = ["Texture"]
        comment = ["The texture characteristics of an image, such as contrast, dissimilarity, etc."]

    class has_contrast(DatatypeProperty):
        domain = [Texture]
        range = [float]
        
    class has_dissimilarity(DatatypeProperty):
        domain = [Texture]
        range = [float]

    class has_energy(DatatypeProperty):
        domain = [Texture]
        range = [float]

    class has_homogeneity(DatatypeProperty):
        domain = [Texture]
        range = [float]

    class has_correlation(DatatypeProperty):
        domain = [Texture]
        range = [float]

    #### Root Symptoms ####
    class RootSymptoms(Image):
        label = ["Root Symptoms"]
        comment = ["The symptoms observed on the roots of a plant, such as deformations, discoloration, etc."]

    class has_root_deformation(DatatypeProperty):
        domain = [RootSymptoms]
        range = [float]

    class has_root_discoloration(DatatypeProperty):
        domain = [RootSymptoms]
        range = [float]

    class has_contrast(DatatypeProperty):
        domain = [RootSymptoms]
        range = [float]

    class has_dissimilarity(DatatypeProperty):
        domain = [RootSymptoms]
        range = [float]

    class has_energy(DatatypeProperty):
        domain = [RootSymptoms]
        range = [float]

    class has_homogeneity(DatatypeProperty):
        domain = [RootSymptoms]
        range = [float]

    class has_correlation(DatatypeProperty):
        domain = [RootSymptoms]
        range = [float]

    #### Leaf Symptoms ####
    class LeafSymptoms(Image):
        label = ["Leaf Symptoms"]
        comment = ["The symptoms observed on the leaves of a plant, such as spots, discoloration, etc."]

    class has_spot_count(DatatypeProperty):
        domain = [LeafSymptoms]
        range = [float]

    class has_spot_area(DatatypeProperty):
        domain = [LeafSymptoms]
        range = [float]

    class has_spot_color(DatatypeProperty):
        domain = [LeafSymptoms]
        range = [float]

    class has_spot_texture(DatatypeProperty):
        domain = [LeafSymptoms]
        range = [float]

    #### Stem Symptoms ####
    class StemSymptoms(Image):
        label = ["Stem Symptoms"]
        comment = ["The symptoms observed on the stems of a plant, such as lesions, deformation, etc."]
            
    class has_lesion_presence(DatatypeProperty):
        domain = [StemSymptoms]
        range = [float]
            
    class has_lesion_length(DatatypeProperty):
        domain = [StemSymptoms]
        range = [float]

    class has_lesion_width(DatatypeProperty):
        domain = [StemSymptoms]
        range = [float]

    class has_mean_hue(DatatypeProperty):
        domain = [StemSymptoms]
        range = [float]
            
    class has_mean_saturation(DatatypeProperty):
        domain = [StemSymptoms]
        range = [float]
            
    class has_mean_value(DatatypeProperty):
        domain = [StemSymptoms]
        range = [float]

# Save the ontology
onto.save(file="mainOnto_OK.owl")

with onto:
    # Create an instance of Dataset
    dataset_instance = Dataset("dataset_cassava_diseases")
    dataset_instance.has_creation_date.append("2024-05-10")
    dataset_instance.has_url.append("http://www.example.com/dataset")
    dataset_instance.has_size.append(1024.5)
    dataset_instance.has_author.append("Sabidani Yentem Elisée")

    # Create an instance of Image linked to the Dataset
    image_instance = Image("1-bacteria-disease.jpg")

    # Assign color characteristics to the image
    image_instance.has_hue_mean.append(120.0) 
    image_instance.has_hue_std.append(10.0)
    image_instance.has_saturation_mean.append(0.8)
    image_instance.has_saturation_std.append(0.1)
    image_instance.has_value_mean.append(0.6)
    image_instance.has_value_std.append(0.05)

    # Assign texture characteristics to the image
    image_instance.has_contrast.append(0.5)
    image_instance.has_dissimilarity.append(0.3)
    image_instance.has_energy.append(0.7)
    image_instance.has_homogeneity.append(0.4)
    image_instance.has_correlation.append(0.6)

    # Assign leaf symptoms to the image
    image_instance.has_spot_count.append(10)
    image_instance.has_spot_area.append(50.0)
    image_instance.has_spot_color.append(90.0)
    image_instance.has_spot_texture.append(0.25)

    # Assign root symptoms to the image
    image_instance.has_root_deformation.append(0.1)
    image_instance.has_root_discoloration.append(0.2)

    # Assign stem symptoms to the image
    image_instance.has_lesion_presence.append(1)
    image_instance.has_lesion_length.append(20.0)
    image_instance.has_lesion_width.append(5.0)
    image_instance.has_mean_hue.append(110.0)
    image_instance.has_mean_saturation.append(0.7)
    image_instance.has_mean_value.append(0.8)

    # Save the ontology
onto.save(file="mainOnto_OK.owl")

# Create a list to store Dataset property values
dataset_properties = []

# Iterate over Dataset instances and retrieve associated property values
for dataset in onto.Dataset.instances():
    dataset_property = {}
    dataset_property['creation_date'] = dataset.has_creation_date[0] if dataset.has_creation_date else None
    dataset_property['url'] = dataset.has_url[0] if dataset.has_url else None
    dataset_property['size'] = dataset.has_size[0] if dataset.has_size else None
    dataset_property['author'] = dataset.has_author[0] if dataset.has_author else None
    dataset_properties.append(dataset_property)

# Print retrieved values for each Dataset property
print("Dataset Properties:", json.dumps(dataset_properties, indent=4))

# Create a list to store Image property values
image_properties = []

# Iterate over Image instances and retrieve associated property values
for image in onto.Image.instances():
    image_property = {}
    image_property['hue_mean'] = image.has_hue_mean[0] if image.has_hue_mean else None
    image_property['hue_std'] = image.has_hue_std[0] if image.has_hue_std else None
    image_property['saturation_mean'] = image.has_saturation_mean[0] if image.has_saturation_mean else None
    image_property['saturation_std'] = image.has_saturation_std[0] if image.has_saturation_std else None
    image_property['value_mean'] = image.has_value_mean[0] if image.has_value_mean else None
    image_property['value_std'] = image.has_value_std[0] if image.has_value_std else None
    image_property['contrast'] = image.has_contrast[0] if image.has_contrast else None
    image_property['dissimilarity'] = image.has_dissimilarity[0] if image.has_dissimilarity else None
    image_property['energy'] = image.has_energy[0] if image.has_energy else None
    image_property['homogeneity'] = image.has_homogeneity[0] if image.has_homogeneity else None
    image_property['correlation'] = image.has_correlation[0] if image.has_correlation else None
    image_property['spot_count'] = image.has_spot_count[0] if image.has_spot_count else None
    image_property['spot_area'] = image.has_spot_area[0] if image.has_spot_area else None
    image_property['spot_color'] = image.has_spot_color[0] if image.has_spot_color else None
    image_property['spot_texture'] = image.has_spot_texture[0] if image.has_spot_texture else None
    image_property['root_deformation'] = image.has_root_deformation[0] if image.has_root_deformation else None
    image_property['root_discoloration'] = image.has_root_discoloration[0] if image.has_root_discoloration else None
    image_property['lesion_presence'] = image.has_lesion_presence[0] if image.has_lesion_presence else None
    image_property['lesion_length'] = image.has_lesion_length[0] if image.has_lesion_length else None
    image_property['lesion_width'] = image.has_lesion_width[0] if image.has_lesion_width else None
    image_property['mean_hue'] = image.has_mean_hue[0] if image.has_mean_hue else None
    image_property['mean_saturation'] = image.has_mean_saturation[0] if image.has_mean_saturation else None
    image_property['mean_value'] = image.has_mean_value[0] if image.has_mean_value else None
    image_properties.append(image_property)

# Print retrieved values for each Image property
print("Image Properties:",  json.dumps(image_properties, indent=4))

# Uncomment to print all classes and properties in the ontology
# print(list(onto.classes()))
# print(list(onto.properties()))
