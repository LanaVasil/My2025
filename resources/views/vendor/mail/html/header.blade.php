@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('storage/img/favicon.svg')}}" class="logo" alt="DU COP Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
