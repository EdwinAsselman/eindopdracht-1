<button {{ $attributes->merge([ 'class' => 'appearance-none border border-gray-400 rounded-md hover:bg-green-600 bg-green-500 text-white p-2' ]) }} type="submit">{{ $slot }}</button>