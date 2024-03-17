<div class=" absolute top-0 bg-white w-screen h-screen z-20">


    <div class="flex min-h-full flex-col justify-center px-6  lg:px-8 ">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900" style="font-family: 'Madimi One', sans-serif ;">Connexion</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="space-y-6">
                <div>
                    <label for="emailConnexion" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="emailConnexion" name="emailConnexion" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2">
                    </div>
                </div>
                <div class="emailIncorrectConnexion text-red-700">
                    <?php if (!empty($_GET['erreur'])) {
                        if ($_GET['erreur'] == 1) {
                            echo ("Email incorrect");
                        }
                    }; ?>
                </div>


                <div>
                    <div class="flex items-center justify-between">
                        <label for="passwordConnexion" class="block text-sm font-medium leading-6 text-gray-900">Mot de passe</label>
                        <!-- <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div> -->
                    </div>
                    <div class="mt-2">
                        <input id="passwordConnexion" name="passwordConnexion" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2">
                    </div>
                </div>
                <div class="champVideConnexion text-red-700">
                    <?php if (!empty($_GET['erreur'])) {
                        if ($_GET['erreur'] == 4) {
                            echo ("Merci de remplir tous les champs.");
                        } else if ($_GET['erreur'] == 6) {
                            echo ("Email ou mot de passe incorrect");
                        }
                    }; ?>

                </div>


                <div>
                    <button type="submit" class="bouttonConnexion flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Connexion</button>
                </div>
            </div>
        </div>
    </div>
</div>