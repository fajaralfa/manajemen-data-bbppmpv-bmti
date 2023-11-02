<script>
    import Input from './Input.svelte'
    export let value
    export let error = ''
</script>

<Input type="text" {value} binder={(e) => (value = e.currentTarget.value)} {error}><slot>Input Date</slot></Input>
