<script>
    import { router } from "@inertiajs/svelte"

    export let deleteUrl
    export let showDeleteAlert = false

    function doDelete() {
        router.delete(deleteUrl)
        showDeleteAlert = false
    }
</script>

<dialog id="my_modal_1" class="modal" open={showDeleteAlert}>
  <div class="modal-box">
    <p class="py-4 text-xl text-center">Anda Yakin Ingin Menghapus Data Ini?</p>
    <div class="modal-action flex justify-center">
      <form method="dialog">
        <button class="btn bg-red-700 text-white" on:click={doDelete}>Delete</button>
        <button class="btn bg-blue-700 text-white" on:click={() => showDeleteAlert = false}>Cancel</button>
      </form>
    </div>
  </div>
</dialog>