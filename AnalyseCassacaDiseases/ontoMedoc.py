from owlready2 import *

# Charger ou créer l'ontologie
onto = get_ontology("http://www.example.org/medications.owl")

with onto:
    class Drug(Thing):
        pass

    class Ingredient(Thing):
        pass

    # Définir une propriété pour spécifier la quantité d'ingrédient dans un médicament
    class has_quantity(DatatypeProperty):
        domain = [Drug]
        range = [int]

    # Définir une propriété pour spécifier les effets secondaires d'un médicament
    class has_side_effect(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Définir une propriété pour spécifier la posologie recommandée d'un médicament
    class has_dosage(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la marque d'un médicament
    class has_brand(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la forme d'un médicament (pilule, liquide, etc.)
    class has_form(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la classe thérapeutique d'un médicament
    class has_therapeutic_class(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier l'interaction avec d'autres médicaments
    class has_interaction(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier les contre-indications d'un médicament
    class has_contraindication(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier les indications d'un médicament (à quoi il est prescrit)
    class has_indication(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la forme d'administration d'un médicament (orale, intraveineuse, etc.)
    class has_route_of_administration(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier le fabricant d'un médicament
    class has_manufacturer(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Définir une propriété pour spécifier la posologie recommandée d'un médicament
    class has_dosage(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la forme d'un médicament (pilule, liquide, etc.)
    class has_form(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la classe thérapeutique d'un médicament
    class has_therapeutic_class(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier l'interaction avec d'autres médicaments
    class has_interaction(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier les contre-indications d'un médicament
    class has_contraindication(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier les indications d'un médicament (à quoi il est prescrit)
    class has_indication(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la forme d'administration d'un médicament (orale, intraveineuse, etc.)
    class has_route_of_administration(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier le fabricant d'un médicament
    class has_manufacturer(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Définir une propriété pour spécifier la posologie recommandée d'un médicament
    class has_dosage(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la forme d'un médicament (pilule, liquide, etc.)
    class has_form(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la classe thérapeutique d'un médicament
    class has_therapeutic_class(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier l'interaction avec d'autres médicaments
    class has_interaction(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier les contre-indications d'un médicament
    class has_contraindication(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier les indications d'un médicament (à quoi il est prescrit)
    class has_indication(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier la forme d'administration d'un médicament (orale, intraveineuse, etc.)
    class has_route_of_administration(DatatypeProperty):
        domain = [Drug]
        range = [str]

    # Propriété pour spécifier le fabricant d'un médicament
    class has_manufacturer(DatatypeProperty):
        domain = [Drug]
        range = [str]

# Enregistrement de l'ontologie dans un fichier
onto.save(file="medications.owl")

with onto:
    # Définir des instances de médicaments et d'ingrédients
    aspirin = Drug("aspirin")
    ibuprofen = Drug("ibuprofen")

    water = Ingredient("water")
    acetylsalicylic_acid = Ingredient("acetylsalicylic_acid")
    ibuprofen_active = Ingredient("ibuprofen_active")

    # Spécifier les ingrédients pour chaque médicament en utilisant la propriété has_for_ingredient
    aspirin.has_for_ingredient = [water, acetylsalicylic_acid]
    ibuprofen.has_for_ingredient = [water, ibuprofen_active]

    # Spécifier d'autres propriétés pour chaque médicament
    aspirin.has_quantity.append(100)
    aspirin.has_side_effect.append("stomach pain")
    aspirin.has_dosage.append("Take 1 tablet every 4-6 hours as needed")  
    aspirin.has_brand.append("Bayer") 
    aspirin.has_form.append(["tablet", "OK", "KO"]) 
    aspirin.has_therapeutic_class.append("Analgesic") 
    aspirin.has_interaction.append("May interact with blood thinners") 
    aspirin.has_contraindication.append("Do not take if allergic to aspirin") 
    aspirin.has_indication.append( "Pain relief, fever reduction")
    aspirin.has_route_of_administration.append("Oral") 
    aspirin.has_manufacturer.append("Bayer Pharmaceuticals") 

# Enregistrement des modifications dans le fichier d'ontologie
onto.save(file="medications.owl")
# Accéder aux instances de médicaments et afficher les effets secondaires associés


# Définir des listes pour stocker les valeurs associées à chaque propriété
quantities = []
side_effects = []
dosages = []
brands = []
forms = []
therapeutic_classes = []
interactions = []
contraindications = []
indications = []
routes_of_administration = []
manufacturers = []

# Parcourir les instances de médicaments et récupérer les valeurs associées à chaque propriété
for drug in onto.Drug.instances():
    if drug.has_quantity:
        quantities.append(drug.has_quantity)
    if drug.has_side_effect:
        side_effects.extend(drug.has_side_effect)
    if drug.has_dosage:
        dosages.extend(drug.has_dosage)
    if drug.has_brand:
        brands.extend(drug.has_brand)
    if drug.has_form:
        forms.extend(drug.has_form)
    if drug.has_therapeutic_class:
        therapeutic_classes.extend(drug.has_therapeutic_class)
    if drug.has_interaction:
        interactions.extend(drug.has_interaction)
    if drug.has_contraindication:
        contraindications.extend(drug.has_contraindication)
    if drug.has_indication:
        indications.extend(drug.has_indication)
    if drug.has_route_of_administration:
        routes_of_administration.extend(drug.has_route_of_administration)
    if drug.has_manufacturer:
        manufacturers.extend(drug.has_manufacturer)

# Afficher les valeurs récupérées pour chaque propriété
print("Quantities:", quantities)
print("Side Effects:", side_effects)
print("Dosages:", dosages)
print("Brands:", brands)
print("Forms:", forms)
print("Therapeutic Classes:", therapeutic_classes)
print("Interactions:", interactions)
print("Contraindications:", contraindications)
print("Indications:", indications)
print("Routes of Administration:", routes_of_administration)
print("Manufacturers:", manufacturers)


# Afficher toutes les classes dans l'ontologie
# print(list(onto.classes()))

# # Afficher toutes les propriétés dans l'ontologie
# print(list(onto.properties()))

# # Afficher les propriétés de la classe Segment
# print(list(onto.Segment.is_a))

# # Vérifier si les propriétés spécifiques sont incluses dans la classe Segment
# print(onto.Segment.hue_mean)
# print(onto.Segment.hue_std)
# # Continuez ainsi pour toutes les propriétés que vous avez définies pour Segment
