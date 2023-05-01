@php
$counter =1;
@endphp
@foreach ($news as $event)
<tr style="border-bottom: 1px double #5d657b">
<th scope="row" style="color: #2f80ed">{{$counter++}}</th>
<td><img src="/images/news/{{$event->image}}" alt="error" style="width: 60px"></td>
<td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$event->title}}</p></td>
<td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p class=" title" style=" overflow-wrap: break-word">{{$event->category->name_ar}}</p></td>
<td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($event->created_at)->format('d/m/Y   h:i:s')}}</p></td>
<td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($event->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
<td>
<a class="btn btn-secondary ms-1 py-1" href="{{ route('News.edit', $event->id) }}">تعديل</a> 
<a class="btn btn-danger ms-1 py-1" href="{{ route('News.soft_delete', $event->id) }}">حذف</a>  
</td>
</tr>
@endforeach