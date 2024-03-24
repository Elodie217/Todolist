<?php
?>

<div class=" absolute top-0 w-screen h-screen z-20">


    <div class="flex py-6 my-1.5 flex-col justify-center px-6  lg:px-8 bg-[#ffffff99] rounded-2xl sm:mx-auto sm:w-full sm:max-w-sm h-fit">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm relative">
            <button class="flex items-center absolute left-0 " onclick="redirection('divInscription', 'divAccueil')"><i class="mr-2.5 fa-solid fa-circle-arrow-left"></i>
                <p>Retour</p>
            </button>

            <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mt-8" style="font-family: 'Madimi One', sans-serif ;">Inscription</h2>
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="space-y-6">
                <div>
                    <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                    <div class="mt-2">
                        <input id="nom" name="nom" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2">
                    </div>
                </div>

                <div>
                    <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">Prenom</label>
                    <div class="mt-2">
                        <input id="prenom" name="prenom" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2">
                    </div>
                </div>
                <div class="emailIncorrectInscription text-red-700"></div>


                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mot de passe</label>

                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2">
                    </div>
                </div>
                <div class="mdpIncorrectInscription text-red-700"></div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password2" class="block text-sm font-medium leading-6 text-gray-900">Confirmation du mot de passe</label>

                    </div>
                    <div class="mt-2">
                        <input id="password2" name="password2" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2">
                    </div>
                </div>
                <div class="champVideInscription text-red-700"></div>

                <div>
                    <button type="submit" class="boutonInscription flex w-full justify-center rounded-md bg-[#FF9A99] hover:bg-[#FF9A99]/[.8] px-3 py-1.5 text-sm font-semibold leading-6 text-black shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Inscription</button>
                </div>
            </div>
        </div>
    </div>
</div>