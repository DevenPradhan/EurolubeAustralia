<textarea {{$attributes->merge(['class' => 'rounded-sm border-gray-300 focus:ring-gray-700 focus:border-gray-700 border', 'cols' => '50', 'rows' => '4'])}}>
{{$slot}}
</textarea>