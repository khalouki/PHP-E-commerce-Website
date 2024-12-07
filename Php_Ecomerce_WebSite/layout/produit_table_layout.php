
<style>
    /* The Modal (background) */
    .modal {
       overflow: auto; /* Enable scroll if needed */
       background-color: rgb(200 204 227 / 40%) ;/* Fallback color */
       backdrop-filter: blur(5px); /* Blur effect */
        transition: opacity 0.5s ease;
    }
    .show{
        opacity: 0;
    }
    /* The Close Button */
    .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }
    .close:hover,
    .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
    }
</style>
<!----------------------tableau des produit -------------------->
<div class="flex justify-center item-center"><h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">table des produits</h1></div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between p-4">
        <div class=" w-1/2 relative">
            <form>   
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                    <button style="background:rgb(174 179 191)" type="submit" class="text-white absolute end-2.5 bottom-2.5  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form> 
        </div>
        <button id="show_add" type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            ajouter neauveua produit
        </button>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white-700 uppercase bg-blue-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    image
                </th>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Prix
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Contité
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                <th scope="col" class="hidden px-6 py-3">
                    id
                </th>
            </tr>
        </thead>
        <tbody id="table-pro">
        </tbody>
    </table>
</div>
<!-- ------------------- 1-  Modifer MODAL------------------- -->
<div id="crud-modal"   class=" flex justify-center items-center modal hidden overflow-y-auto overflow-x-hidden h-screen fixed top-0 right-0 left-0 z-50  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div style="box-shadow: 0 0 10px rgb(0 0 1/44%)" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    modifer le produit
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <span class="close">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="modify_produit_form" enctype="multipart/form-data">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" name="prix" id="prix" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select name="caté" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="AC">Select category</option>
                            <option value="AC">Accessoir</option>
                            <option value="PC">PC</option>
                            <option value="CE">Carte Electronique</option>
                            <option value="ST">stockage</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">contité</label>
                        <input type="text" name="contité" id="contité" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required="">
                    </div>
                    <input type="hidden" name="id_prod" id="id_prod" value="">
                </div>
                <div class="flex justify-center item-center">
                    <input type="hidden" name="opt" value="modifier">
                    <button type="submit"  style="width:15rem;font-size:18px" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">modifier</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<!---------------------  2- Add new product modal -------------------->
<div id="ajout_produit"  class="add hidden flex justify-center items-center modal overflow-y-auto overflow-x-hidden h-screen fixed top-0 right-0 left-0 z-50  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div style="transform:scale(0.94)" class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div  style="box-shadow: 0 0 10px rgb(0 0 1/44%);transition:opacity 0.5s ease" class=" relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div  class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class=" effec text-xl font-semibold text-gray-900 dark:text-white">
                    Ajouter nouveaux produit
                </h3>
                <button id="close_add" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4"  id="ajoute_produit_form" enctype="multipart/form-data">
                    <!--nom produit -->
                    <div>
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                        <input type="text" id="nom_pro" name="nom_prod"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nom de votre produit"  />
                        <span id="mes_nom" style="padding-left:5px;color:red"></span>
                    </div>
                    <!--prix produit -->
                    <div>
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
                        <input type="text" id="prix_pro" name="prix_prod"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nom de votre produit"  />
                        <span id="mes_prix" style="padding-left:5px;color:red"></span>
                    </div>
                    <!--Contité produit -->
                    <div>
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contité</label>
                        <input type="text" id="contité_pro" name="contité_prod"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="la contité de produit" />
                        <span id="mes_contité" style="padding-left:5px;color:red"></span>
                    </div>
                    <!--category -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="caté_prod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="AC">Select category</option>
                            <option value="AC">Accessoir</option>
                            <option value="PC">PC</option>
                            <option value="CE">Carte Electronique</option>
                            <option value="ST">stockage</option>
                        </select>
                    </div>
                    <!--photo produit -->
                    <div>
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">image</label>
                        <input type="file" id="image_pro" name="imag"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  />
                    </div>
                    <div class="flex justify-center item-center">
                    <input type="hidden" name="opt" value="add">
                    <button type="submit"  style="width:15rem;font-size:18px" class="text-black bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<!---------------------- 3- delete produit---------------------------->
<div id="popup-modal" tabindex="-1" class="hidden  flex justify-center items-center  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div style="box-shadow: 0 0 10px rgb(0 0 1/44%)" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
               <div class="flex justify-center">
                <form  id="delete_produit_form">
                    <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        oui,je suis sur
                    </button>
                    <input type="text" name="productId" id="cmd_id" class="hidden" value="">
                    <input type="hidden" name="opt" value="delete">
                </form>
                <button id="close_delete" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Anuller</button>
            </div>
            </div>
        </div>
    </div>
</div>
<!--dispaly image content-->
<div id="image_content"  class="  hidden flex justify-center items-center modal overflow-y-auto overflow-x-hidden h-screen fixed top-0 right-0 left-0 z-50  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div style="transform:scale(0.94)" class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div style="box-shadow: 0 0 10px rgb(0 0 1/44%)" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div  class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 id="title_img" class=" effec text-xl font-semibold text-gray-900 dark:text-white">
                </h3>
                <button id="close_img" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                    <input type="image" style="width:356px" src="" id="image_ch">
            </div>
        </div>
    </div>
</div>
<!----------------------- 4- pagination icone ------------------------->
<nav  class="mt-3 flex justify-center" aria-label="Page navigation example">
    <ul id="pagination-links" class="flex items-center -space-x-px h-8 text-sm">
    </ul>
</nav> 



