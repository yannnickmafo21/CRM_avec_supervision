<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service client</title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
    </header>

    <main><div id="app">

        <section class="zone">

            <!--entete de la page -->

            <section class="entete" >
                <entete></entete>
            </section>

            <!-- espace dédier au profil -->

            <section class="profil">
                <profil></profil>
            </section>

            <!-- liste des discussions en attente -->

            <section class="liste_discussion">
                <liste_discussion></liste_discussion>
            </section>

            <!-- zone de saisie -->

            <section class="espace_discussion">
                <espace_discussion_client></espace_discussion_client>
            </section>

        </section>
    </div></main>

    <footer>

    </footer>
</body>
</html>
