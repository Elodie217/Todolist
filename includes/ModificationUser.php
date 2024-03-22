<?php
$utilisateur
?>

<div class=" absolute top-0 bg-white w-screen h-screen z-20">

    <div class="absolute top-6 right-6 p-2 bg-red-200 border-2 border-red-500 rounded-2xl py-2 text-center">Supprimer le compte</div>

    <div class="flex min-h-full flex-col justify-center px-6  lg:px-8 ">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm relative">
            <button class="btnRetourModificationUser flex items-center absolute left-0 ">
                <i class="mr-2.5 fa-solid fa-circle-arrow-left"></i>
                <p>Retour</p>
            </button>

            <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900" style="font-family: 'Madimi One', sans-serif ;">Modification</h2>
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="space-y-6">
                <div>
                    <label for="nomModification" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                    <div class="mt-2">
                        <input id="nomModification" name="nomModification" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2" value="<?php $utilisateur->getNom() ?>">
                    </div>
                </div>

                <div>
                    <label for="prenomModification" class="block text-sm font-medium leading-6 text-gray-900">Prenom</label>
                    <div class="mt-2">
                        <input id="prenomModification" name="prenomModification" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2" value="<?php $utilisateur->getPrenom() ?>">
                    </div>
                </div>

                <div>
                    <label for="emailModification" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="emailModification" name="emailModification" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-2" value="<?php $utilisateur->getEmail() ?>">
                    </div>
                </div>
                <div class="emailIncorrectModification text-red-700"></div>

                <div class="champVideModification text-red-700"></div>

                <div>
                    <button type="submit" class="boutonModification flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-red-700">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>