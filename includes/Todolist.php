 <?php

    use CategorieManager\CategorieManager;
    use DbConnexion\DbConnexion;
    use UserManager\UserManager;


    $DbConnexion = new DbConnexion();
    $UserManager = new UserManager($DbConnexion);

    ?>
 <div></div>
 <header class="bg-[#FFF8E8]/[.9] pt-4">
     <a href="./deconnexion.php" class="px-2.5 py-2 bg-[#FC8C78] hover:bg-[#FFB59F] rounded-2xl ml-[85%] shadow-lg">Déconnexion</a>
     <h1 class="text-center text-5xl pb-5 -mt-4" style="font-family: 'Madimi One', sans-serif ;">To Do list</h1>
 </header>


 <main class="flex">
     <section class="menuGauche min-w-56 px-2.5 py-2.5 bg-[#FFF8E8]/[.9]">
         <p class="nomPrenom text-right mr-2 font-semibold mb-7 text-2xl capitalize"></p>
         <!--Nom et prénom  -->
         <button id="btnModifier" class=" btnModifier text-right ml-6">Modifier mon profil</button>
     </section>

     <section class="formulaireTodo w-fit max-w-[430px] min-w-[400px] p-3.5 shadow-lg m-9 rounded-2xl h-fit bg-[#DFE0DF]/[.6]">

         <h2 class="text-2xl text-center font-semibold">Nouvelle tache</h2>
         <div>
             <div class="flex flex-col py-2.5">
                 <label for="titre">Titre</label>
                 <input type="text" name="titre" id="titre" class="border-2 border-gray-400 border-solid rounded-lg indent-2" required>
             </div>
             <div class="flex justify-between">
                 <div class="flex flex-col py-2.5">
                     <label for="date">Date</label>
                     <input type="date" name="date" id="date" class="border-2 border-gray-400 border-solid rounded-lg indent-2" required>
                 </div>
                 <div class="flex flex-col py-2.5">
                     <label for="priorite">Priorité</label>
                     <select id="priorite" name="priorite" type="text" required class="border-2 border-gray-400 border-solid rounded-lg indent-2">
                         <option class='' value="normal">Normal</option>
                         <option class='' value="important">Important</option>
                         <option class='' value="urgent">Urgent</option>
                     </select>
                 </div>
             </div>
             <div class="flex flex-col py-2.5">
                 <label for="description">Description</label>
                 <input type="text" name="description" id="description" class="border-2 border-gray-400 border-solid rounded-lg indent-2" required>
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
                             <input type="checkbox" id="<?= $categorie->getId_categorie()  ?> " value="<?= $categorie->getId_categorie()  ?>" name="checkbox" />
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

             <div class="erreurTodo text-red-700"></div>

             <button type="submit" class="boutonAjouter flex w-full justify-center rounded-md bg-[#FC8C78] hover:bg-[#FFB59F] px-3 py-2.5 text-sm font-semibold leading-6 text-black shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter</button>

             <div class="tacheCreer text-lime-600 hidden my-2 text-center">Tache créée !</div>

         </div>
     </section>


     <section class="listTache flex flex-wrap">

     </section>
 </main>

 <div class="divModificationUser hidden">
     <?php
        include 'ModificationUser.php';
        ?>
 </div>


 <div class="divModificationTache hidden">
     <?php
        include 'ModificationTache.php';
        ?>
 </div>