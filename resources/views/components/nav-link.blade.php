<a {{$attributes}}
class=" {{$active ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-[#478CCF] dark:hover:bg-gray-700 group' : 'flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-[#478CCF] dark:hover:bg-gray-700 group'}} ">{{$slot}}
</a>