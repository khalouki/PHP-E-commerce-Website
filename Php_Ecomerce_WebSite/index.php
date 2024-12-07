<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="layout/css/index.css">
    <title>Separation</title>
</head>
<body>
<!-------------------------------------------------->
<div class=" flex justify-center items-center relative h-32 w-32 h-screen w-screen ...">
    <div style="background: #859dc9;width: 50%;" class=" flex justify-center items-center   absolute inset-y-0 w-[50%] left-0 w-16 ...">
    <h1 class=" client_side absolute top-0 right-0 w-full text-center">Côté client</h1>
        <div class="circle transform h-64 bg-indigo-400 w-80 hover:bg-indigo-600 transition duration-500 hover:scale-125 ">
            <a href="layout/client_side.php">
                <img class="circle" src="layout/images/client_side.jpg" alt="">
            </a>
        </div> 
    </div>
    <div style="width:50%" class=" flex justify-center items-center  absolute inset-y-0  right-0 w-16 ...">
    <h1 class=" adm_side absolute top-0 left-0 w-full text-center">Côté Admin</h1>
        <div class="circle transform h-64 bg-indigo-400 w-80 hover:bg-indigo-600 transition duration-500 hover:scale-125 ">
          <a href="layout/dashbord.php"> 
                <img class="circle" src="layout/images/admin.jpg" alt="">
           </a>
        </div>
    </div>
</div>
</body>
</html>