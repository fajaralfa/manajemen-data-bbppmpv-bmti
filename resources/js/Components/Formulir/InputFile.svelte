<script>
    import Input from './Input.svelte'
    export let value
    export let error = ''
</script>

<Input type="file" binder={(e) => (value = e.target.files[0])} {error} class="file-input"><slot>Input File</slot></Input>
