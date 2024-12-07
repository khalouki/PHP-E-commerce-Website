<style>
    .btn_ville_search{
    background: rgb(174 179 191);
    position: relative;
    left: 2%;
    top: 0px;
    width: 215px;
    }
</style>
<!----------------------tableau des produit -------------------->
<div class="flex justify-center item-center">
    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
        table des Commandes</h1>
    </div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between p-4">
        <div class=" w-1/2 relative">
            <form id="filter_ville">   
                <div class="flex">
                    <select name="select_ville" id="cmd_vil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        
                    </select> 
                    <button   type="submit" class=" btn_ville_search text-white absolute end-2.5 bottom-2.5  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>              
                </div>
            </form> 
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white-700 uppercase bg-blue-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    nom
                </th>
                <th scope="col" class="px-6 py-3">
                    prénom
                </th>
                <th scope="col" class="px-6 py-3">
                    ville
                </th>
                <th scope="col" class="px-6 py-3">
                    teliphone
                </th>
                <th scope="col" class="px-6 py-3">
                    adress
                </th>
                <th scope="col" class="px-6 py-3">
                    produit
                </th>
                <th scope="col" class="px-6 py-3">
                    contité
                </th>
                <th scope="col" class=" px-6 py-3">
                    Etat
                </th>
            </tr>
        </thead>
        <tbody id="table-commande">
        </tbody>
    </table>
</div>
<nav  class="mt-3 flex justify-center" aria-label="Page navigation example">
    <ul id="pagination_cmd-links" class="flex items-center -space-x-px h-8 text-sm">
    </ul>
</nav>
<div id="popup-modal" tabindex="-1" class="hidden modal flex justify-center items-center  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div style="box-shadow: 0 0 10px rgb(0 0 1/44%)" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to validate this commande?</h3>
               <div class="flex justify-center">
                <form  id="valide_cmd">
                    <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Oui,je confirme
                    </button>
                    <input type="text" name="cmd_id" id="cmd_id" class="hidden" value="">
                    <input type="hidden" name="opt" value="valide">
                </form>
                <button id="close_valide" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Anuller</button>
            </div>
            </div>
        </div>
    </div>
</div>
