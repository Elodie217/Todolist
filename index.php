<?php
require_once __DIR__ . './autoload.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Madimi+One&display=swap" rel="stylesheet">
</head>
<!-- font-family: "Dancing Script", cursive; -->
<!--bg-[url('./asset/media/bureau')] bg-cover bg-fixed bg-center -->

<body class="text-lg relative " style="font-family: sans-serif ;">
    <div <?php if (!empty($_GET['inscription'])) {
            ?> class="" <?php
                    } else { ?> class="hidden" <?php }; ?>>
        <?php include 'includes/Inscription.php'; ?>
    </div>
    <div class="">
        <?php
        include 'includes/Connexion.php';
        ?>
    </div>

    <section class="hidden">

        <header class="bg-[#FFF8E8]/[.9]">
            <button class="px-2.5 py-2 bg-[#DFE0DF] rounded-2xl ml-[85%] mt-4 shadow-lg">Déconnexion</button>
            <h1 class="text-center text-5xl pb-5 -mt-3" style="font-family: 'Madimi One', sans-serif ;">To Do list</h1>
        </header>

        <main class="flex">
            <section class="menuGauche w-1/6 px-2.5 py-2.5 bg-[#FFF8E8]/[.9]">
                <p class="text-right mr-4 font-semibold mb-7 text-2xl">Prénom Nom</p>
                <p class="text-right mr-4">Modifier mon profil</p>
            </section>
            <section class="formulaireTodo w-[30%] p-3.5 shadow-lg m-9 rounded-2xl h-fit bg-[#DFE0DF]/[.6]">
                <h2 class="text-2xl text-center font-semibold">Nouvelle tache</h2>
                <form>
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
                        <div class="flex flex-wrap">

                            <div class="px-2.5 w-40">
                                <input type="checkbox" id="travail" name="travail" checked />
                                <label for="travail">Travail</label>
                            </div>

                            <div class="px-2.5 w-40">
                                <input type="checkbox" id="amis" name="amis" />
                                <label for="amis">Amis</label>
                            </div>
                            <div class="px-2.5 w-40">
                                <input type="checkbox" id="famille" name="famille" />
                                <label for="famille">Famille</label>
                            </div>
                        </div>

                    </div>
                </form>
            </section>
            <section class="listTache w-1/2 flex flex-wrap mr-[3%]">
                <div class="w-2/5 m-[5%] shadow-lg rounded-2xl relative bg-[#DFE0DF]/[.6]">
                    <div class="w-full bg-[#ff0000] h-3.5 rounded-t-2xl"></div>

                    <a href='' class='absolute top-5 right-3  w-7 h-7 flex items-center flex-col justify-center rounded-xl cursor-pointer'><i class='fa-solid fa-trash text-black'></i></a>
                    <a href='' class='absolute top-5 right-10  w-7 h-7 flex items-center flex-col justify-center rounded-xl cursor-pointer'> <i class='fa-solid fa-pen-to-square text-black'></i> </a>

                    <div class="px-2.5 py-2.5">
                        <h3 class="text-2xl text-center my-3 font-semibold">Titre tache</h3>
                        <div class="flex justify-between">
                            <p>25/02/2024</p>
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                        <div class="my-2.5">
                            <p>Description</p>
                            <p>Lorem ipsum dolor sit amet consectetur ...</p>
                        </div>
                    </div>
                </div>
                <div class="w-2/5 m-[5%] shadow-xl rounded-2xl relative bg-[#DFE0DF]/[.6]">
                    <div class="w-full bg-[#ff4f00] h-3.5 rounded-t-2xl"></div>
                    <a href='' class='absolute top-5 right-3  w-7 h-7 flex items-center flex-col justify-center rounded-xl cursor-pointer'><i class='fa-solid fa-trash text-black'></i></a>
                    <a href='' class='absolute top-5 right-10  w-7 h-7 flex items-center flex-col justify-center rounded-xl cursor-pointer'> <i class='fa-solid fa-pen-to-square text-black'></i> </a>
                    <div class="px-2.5 py-2.5">
                        <h3 class="text-2xl text-center my-3 font-semibold">Titre tache</h3>
                        <div class="flex justify-between">
                            <p>25/02/2024</p>
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                        <div class="my-2.5">
                            <p>Description</p>
                            <p>Lorem ipsum dolor sit amet consectetur ...</p>
                        </div>
                    </div>
                </div>
                <div class="w-2/5 m-[5%] shadow-2xl rounded-2xl relative bg-[#DFE0DF]/[.6]">
                    <div class="w-full bg-[#1eff00] h-3.5 rounded-t-2xl "></div>
                    <a href='' class='absolute top-5 right-3  w-7 h-7 flex items-center flex-col justify-center rounded-xl cursor-pointer'><i class='fa-solid fa-trash text-black'></i></a>
                    <a href='' class='absolute top-5 right-10  w-7 h-7 flex items-center flex-col justify-center rounded-xl cursor-pointer'> <i class='fa-solid fa-pen-to-square text-black'></i> </a>
                    <div class="px-2.5 py-2.5">
                        <h3 class="text-2xl text-center my-3 font-semibold">Titre tache</h3>
                        <div class="flex justify-between">
                            <p>25/02/2024</p>
                            <i class="fa-solid fa-dumbbell"></i>
                        </div>
                        <div class="my-2.5">
                            <p>Description</p>
                            <p>Lorem ipsum dolor sit amet consectetur ...</p>
                        </div>
                    </div>
                </div>


            </section>
        </main>
    </section>

</body>
<script src="script.js"></script>

<script src="https://cdn.tailwindcss.com"></script>

<script src="https://kit.fontawesome.com/97cd5da9a0.js" crossorigin="anonymous"></script>

</html>