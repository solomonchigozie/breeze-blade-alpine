<div>
   <h3>Hello world</h3>

   @php 
        $languages = ['php', 'javascript','dart','moment.js'];
   @endphp

   @foreach($languages as $language)
        <x-forms.badge :text='$language' />
   @endforeach

   <x-alert text='this is a text data' />
   <x-alert text='overboard' />
   <x-alert text="honor will come" />
   <x-forms.button />
   <x-forms.form-select />
</div>
