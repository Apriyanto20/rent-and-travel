<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Code Merk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Merk
                    </th>
                </tr>
            </thead>
            <tbody id="merk-rows">
                
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const getDataMerk = async () => {
            await axios.get('http://localhost:3000/merk')
                .then((response) => {
                    const merks = response.data;

                    let text = "";
                    merks.forEach((element, index) => {
                        text += `
                        <tr class="bg-white dark:bg-gray-800" id="merk-table">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                ${index + 1}
                            </th>
                            <td class="px-6 py-4">
                                ${element.codeMerk}
                            </td>
                            <td class="px-6 py-4">
                                ${element.merk}
                            </td>
                        </tr>
                        `
                    });
                    document.getElementById('merk-rows').innerHTML = text;
                })
                .catch((error) => {
                    console.log(error);
                });
        }

        getDataMerk();
    </script>
</body>

</html>
