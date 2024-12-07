<style>
    .modal {
       overflow: auto; /* Enable scroll if needed */
       background-color: rgb(200 204 227 / 40%) ;/* Fallback color */
       backdrop-filter: blur(5px); /* Blur effect */
        transition: opacity 0.5s ease;
    }
</style>
<!----------------------tableau des produit -------------------->
<div class="flex justify-center item-center">
    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">
        messages des client</h1>
    </div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white-700 uppercase bg-blue-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    nom client
                </th>
                <th scope="col" class="px-6 py-3">
                    numéro teliphone
                </th>
                <th scope="col" class="px-6 py-3">
                    email de client
                </th>
                <th scope="col" class="px-6 py-3">
                    supprimer
                </th>
                <th scope="col" class="px-6 py-3">
                    message
                </th>
            </tr>
        </thead>
        <tbody id="table-message">
        </tbody>
    </table>
</div>
<nav  class="mt-3 flex justify-center" aria-label="Page navigation example">
  <ul id="pagination_message-links" class="flex items-center -space-x-px h-8 text-sm">
  </ul>
</nav>
<div id="delete_message_modal" tabindex="-1" class="hidden  flex justify-center items-center  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div style="box-shadow: 0 0 10px rgb(0 0 1/44%)" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                <div class="flex justify-center">
                <form  id="delete_message_forme">
                    <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        oui,je suis sur
                    </button>
                    <input type="text" name="messageId" id="message_id" class="hidden" value="">
                    <input type="hidden" name="opt" value="delete_message">
                </form>
                <button id="close_delete" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Anuller</button>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="message_content"  class="  hidden flex justify-center items-center modal overflow-y-auto overflow-x-hidden h-screen fixed top-0 right-0 left-0 z-50  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div style="transform:scale(0.94)" class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div style="box-shadow: 0 0 10px rgb(0 0 1/44%)" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div  class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class=" effec text-xl font-semibold text-gray-900 dark:text-white">
                    Message
                </h3>
                <button id="close_mess" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div id="mess" class="p-4 md:p-5">
                </div>
                <center>          
                    <button id="corriel" type="button" class="text-black bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                       
                    </button>
                </center>
            </div>
        </div>
    </div>
</div>