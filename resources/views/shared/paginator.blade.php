<div class="flex-1 text-right">
    <span class="dark:text-white">Selecteer aantal per pagina:</span>
    
    <select class="rounded-md border-2 border-gray-200 dark:text-white dark:bg-gray-600 dark:border-gray-700 dark:placeholder-white" wire:model="paginate">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select>
</div>