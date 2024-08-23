<form action="" class="border-2 rounded-lg p-4 pb-0 ec-clip bg-cover bg-center bg-no-repeat flex">
    <div class="w-[35%]"></div>
    <div class="w-[65%] flex gap-3 flex-col">
        <!-- Search Item -->
        <div class=" items-center gap-4">

            <p for="cars" class="">نوع ملک</p>
            <div class="flex items-center gap-6">
                <button wire:click.prevent='PropertyChange(0)' class="
                border px-2 flex justify-center items-center border-mahdavi rounded text-mahdavi font-bold
                @if ($propertyType===0)
                    text-white
                    bg-mahdavi
                @endif
                
                ">زمین</button>
                <button wire:click.prevent='PropertyChange(1)' class="
                border px-2 flex justify-center items-center border-mahdavi rounded text-mahdavi font-bold
                @if ($propertyType===1)
                    text-white
                    bg-mahdavi
                @endif
                
                ">خانه</button>
                <button wire:click.prevent='PropertyChange(2)' class="
                border px-2 flex justify-center items-center border-mahdavi rounded text-mahdavi font-bold
                @if ($propertyType===2)
                    text-white
                    bg-mahdavi
                @endif
                
                ">ویلا</button>
                <button wire:click.prevent='PropertyChange(3)' class="
                border px-2 flex justify-center items-center border-mahdavi rounded text-mahdavi font-bold
                @if ($propertyType===3)
                    text-white
                    bg-mahdavi
                @endif
                
                ">تجاری</button>
            </div>
        </div>
        <!-- Search Item -->
        <div class=" items-center gap-4">
            <p for="cars" class="">نوع معامله</p>
            <div class="flex items-center gap-4">
                <button wire:click.prevent='DealChange(0)' class="
                border px-2 flex justify-center items-center border-mahdavi rounded text-mahdavi font-bold
                @if ($dealType===0)
                    text-white
                    bg-mahdavi
                @endif
                
                ">فروش</button>
                <button wire:click.prevent='DealChange(1)' class="
                border px-2 flex justify-center items-center border-mahdavi rounded text-mahdavi font-bold
                @if ($dealType===1)
                    text-white
                    bg-mahdavi
                @endif
                
                ">رهن</button>
                <button wire:click.prevent='DealChange(2)' class="
                border px-2 flex justify-center items-center border-mahdavi rounded text-mahdavi font-bold
                @if ($dealType===2)
                    text-white
                    bg-mahdavi
                @endif
                
                ">اجاره</button>
                <button wire:click.prevent='DealChange(3)' class="
                border px-2 flex justify-center items-center border-mahdavi rounded text-mahdavi font-bold
                @if ($dealType===3)
                    text-white
                    bg-mahdavi
                @endif
                
                ">پروژه</button>
            </div>
        </div>
        <div class=" flex gap-4">
            <button wire:click.prevent=''
                class="font-bold text-mahdavi flex items-center gap-2 border-2 border-mahdavi px-4 py-1 rounded hover:cursor-pointer hover:bg-mahdavi hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
                <div class="">انتخاب شهر</div>
            </button>
            <div class="flex">
                <button type="submit"
                    class="bg-mahdavi border-2 border-mahdavi px-4 py-1 rounded text-white font-bold hover:bg-white hover:text-mahdavi transition-colors">جستوجو</button>
            </div>
        </div>


    </div>

</form>