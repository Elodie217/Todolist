<?php

?>

<div class="absolute top-0 w-screen h-screen z-20">

    <button class="supprimerUser absolute top-16 right-52 p-2 bg-red-200 border-2 border-red-500 rounded-2xl py-2 text-center">Supprimer le compte</button>

    <div class="flex py-16 mt-[8vh] flex-col justify-center px-6  lg:px-8 bg-[#ffffffe0] rounded-2xl sm:mx-auto sm:w-full sm:max-w-sm h-fit">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm relative">
            <button class="btnRetourModificationUser flex items-center absolute left-0 ">
                <i class="mr-2.5 fa-solid fa-circle-arrow-left"></i>
                <p>Retour</p>
            </button>

            <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mt-8" style="font-family: 'Madimi One', sans-serif ;">Modification</h2>
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="space-y-6">
                <div class="formModification">
                    <!-- Ajout ici du formulaire en JS -->
                </div>
                <div class="emailIncorrectModification text-red-700"></div>

                <div class="champVideModification text-red-700"></div>
                <div>
                    <button type="submit" class="boutonModification flex w-full justify-center rounded-md bg-[#FC8C78] hover:bg-[#FFB59F] px-3 py-1.5 text-sm font-semibold leading-6 text-black shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>