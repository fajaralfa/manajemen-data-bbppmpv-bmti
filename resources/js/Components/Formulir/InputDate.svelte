<script>
    import Input from './Input.svelte'
    export let value
    export let error = ''
</script>

<Input type="date" {value} binder={(e) => (value = e.currentTarget.value)} {error}><slot>Input Date</slot></Input>
