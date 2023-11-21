<script>
    export let label
    export let type = ''
    /**@type {String}*/
    export let value

    let urlGroup, imgPath
    if (type === 'photo') {
        urlGroup = value.split('-')[1]?.split('/')[0]
        imgPath = value.split('/')[1]
        console.log(urlGroup)
    }
</script>

<div class="flex gap-6 justify-between">
    <div class="flex-1">{label} :</div>
    <div class="flex-1">
        {#if type === 'photo'}
            <img src="/{urlGroup}/photo/{imgPath}" alt="Foto Tidak Ada" class="h-12" />
        {:else}
            {value}
        {/if}
    </div>
</div>
