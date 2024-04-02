import os
from PIL import Image

# Chemin de l'image principale
image_path = 'demon.jpg'

# Création du dossier "demon" s'il n'existe pas déjà
dossier_demon = 'demon'
if not os.path.exists(dossier_demon):
    os.makedirs(dossier_demon)

# Ouvrir l'image principale
image_principale = Image.open(image_path)

# Redimensionner l'image principale en 360x360 pixels
image_principale = image_principale.resize((360, 360))

# Dimensions de l'image principale redimensionnée
largeur = image_principale.width
hauteur = image_principale.height

# Dimensions des morceaux
morceau_largeur = 120
morceau_hauteur = 120

# Découpage de l'image redimensionnée en 9 morceaux et enregistrement dans le dossier "demon"
morceau_index = 1
for j in range(3):
    for i in range(3):
        # Coordonnées du morceau
        x = i * morceau_largeur
        y = j * morceau_hauteur

        # Découpage du morceau
        morceau = image_principale.crop((x, y, x + morceau_largeur, y + morceau_hauteur))

        # Chemin d'enregistrement du morceau
        morceau_path = os.path.join(dossier_demon, f'{morceau_index}.jpg')

        # Enregistrement du morceau
        morceau.save(morceau_path)

        # Incrémenter l'index du morceau
        morceau_index += 1

print('Images découpées enregistrées avec succès dans le dossier "demon".')
