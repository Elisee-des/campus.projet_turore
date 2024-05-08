from owlready2 import *

# Charger ou créer l'ontologie
onto = get_ontology("http://www.example.org/medications.owl")

with onto:
    class Image(Thing):
        label = "Image"
        comment = "Class representing images."
        
    class has_for_hole(DatatypeProperty):
        domain = [Image]
        range = [str]
    
    class has_for_color(DatatypeProperty):
        domain = [Image]
        range = [str]
        
    class has_for_texture(DatatypeProperty):
        domain = [Image]
        range = [str]