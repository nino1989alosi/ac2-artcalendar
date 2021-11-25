<x-base-layout>
{{ theme()->getView('task/component', compact('tasks')) }}

@section('scripts')
<!-- SCRIPTS EVENTUALI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
  <script src="{{ asset('js/tasks.js') }}" defer></script>
  @endsection



</x-base-layout>






