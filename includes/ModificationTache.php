<?php

use CategorieManager\CategorieManager;
use DbConnexion\DbConnexion;
use UserManager\UserManager;


$DbConnexion = new DbConnexion();
$UserManager = new UserManager($DbConnexion);
?>

<div class="absolute top-0 w-screen h-screen z-20">

    <div class="flex py-12 mt-[4vh] flex-col justify-center px-6  lg:px-8 bg-[#ffffffe0] rounded-2xl sm:mx-auto sm:w-full sm:max-w-sm h-fit">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm relative">
            <button class="btnRetourModificatioTache flex items-center absolute left-0" onclick="retourTache()">
                <i class="mr-2.5 fa-solid fa-circle-arrow-left"></i>
                <p>Retour</p>
            </button>

            <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 mt-8" style="font-family: 'Madimi One', sans-serif ;">Modification</h2>
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="space-y-6">
                <div class="formModificationTache">
                    <div>
                        <div class="flex flex-col py-2.5">
                            <label for="titreModification">Titre</label>
                            <input type="text" name="titreModification" id="titreModification" class="border-2 border-gray-400 border-solid rounded-lg indent-2 titreModification" required>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex flex-col py-2.5">
                                <label for="dateModification">Date</label>
                                <input type="date" name="dateModification" id="dateModification" class="border-2 border-gray-400 border-solid rounded-lg indent-2" required>
                            </div>
                            <div class="flex flex-col py-2.5">
                                <label for="prioriteModification">Priorité</label>
                                <select id="prioriteModification" name="prioriteModification" type="text" required class="border-2 border-gray-400 border-solid rounded-lg indent-2">
                                    <option class='' value="normal">Normal</option>
                                    <option class='' value="important">Important</option>
                                    <option class='' value="urgent">Urgent</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col py-2.5">
                            <label for="descriptionModification">Description</label>
                            <input type="text" name="descriptionModification" id="descriptionModification" class="border-2 border-gray-400 border-solid rounded-lg indent-2" required>
                        </div>
                        <div class="flex flex-col justify-between py-2.5">
                            <legend>Catégories</legend>
                            <div class="categorie flex flex-wrap">
                                <?php
                                $CategoriesManager = new CategorieManager($DbConnexion);
                                $allCategories = $CategoriesManager->getAllCategories();

                                foreach ($allCategories as $categorie) {
                                ?>
                                    <div class="px-2.5 w-40">
                                        <input type="checkbox" id="checkmodif<?= $categorie->getId_categorie()  ?>" value="<?= $categorie->getId_categorie()  ?>" name="checkbox" class="ckeckboxModification" />
                                        <label for="checkbox" class="categorieCheckbox"><?php if ($categorie->getId_categorie() == 1) {
                                                                                            echo $categorie->getNom_categorie() . '<i class="ml-2.5 fa-solid fa-briefcase"></i>';
                                                                                        } else if ($categorie->getId_categorie() == 2) {
                                                                                            echo $categorie->getNom_categorie() . '<i class="ml-2.5 fa-solid fa-user"></i>';
                                                                                        } else if ($categorie->getId_categorie() == 3) {
                                                                                            echo $categorie->getNom_categorie() . '<i class="ml-2.5 fa-solid fa-handshake-simple"></i>';
                                                                                        } else if ($categorie->getId_categorie() == 4) {
                                                                                            echo $categorie->getNom_categorie() . '<i class="ml-2.5 fa-solid fa-house-user"></i>';
                                                                                        } else if ($categorie->getId_categorie() == 5) {
                                                                                            echo $categorie->getNom_categorie() . '<i class="ml-2.5 fa-solid fa-dumbbell"></i>';
                                                                                        } ?></label>
                                    </div>
                                <?php

                                }
                                ?>
                            </div>

                        </div>

                        <div class="erreurTodoModificer text-red-700"></div>

                    </div>
                    <div class="emailIncorrectTacheModification text-red-700"></div>

                    <div class="champVideTacheModification text-red-700"></div>
                    <div>
                        <button type="submit" class="boutonTacheModification flex w-full justify-center rounded-md bg-[#FC8C78] hover:bg-[#FFB59F] px-3 py-1.5 text-sm font-semibold leading-6 text-black shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>