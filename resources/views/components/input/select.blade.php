<select {{ $attributes->merge([ 'class' => 'appearance-none border-2 border-gray-300 rounded-md p-2 focus:ring hover:bg-gray-100 ring-indigo-400 dark:text-white dark:bg-gray-600 dark:border-gray-700' ])}}>
    {{ $slot }}
</select>