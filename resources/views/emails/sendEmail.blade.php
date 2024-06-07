<form action="{{ route('send.email') }}" method="POST">
    @csrf
    <label for="email">Adresse email du destinataire :</label>
    <input type="email" name="email" id="email" required>

    <label for="subject">Objet de l'email :</label>
    <input type="text" name="subject" id="subject" required>

    <label for="content">Contenu de l'email :</label>
    <textarea name="content" id="content" required></textarea>

    <button type="submit">Envoyer</button>
</form>