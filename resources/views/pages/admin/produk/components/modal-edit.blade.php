<div id="editModal"
    class="modal fixed inset-0 z-50 flex items-center justify-center bg-white/80 dark:bg-black/60 overflow-y-auto py-6 hidden">
    <div class="modal-content bg-white dark:bg-gray-800 shadow-lg rounded-lg w-full max-w-lg p-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold">Edit Produk</h3>
            <button onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="edit-produk" class="space-y-3">
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-3">
                <div>
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-input w-full" required>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="form-label">Kategori</label>
                    <select id="select-edit-kategori" name="kategori_id" class="form-input w-full" required>
                    </select>
                </div>
                <div>
                    <label class="form-label">Status</label>
                    <select name="status" class="form-input w-full" required>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-input w-full" value="125000" required>
                </div>
                <div>
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-input w-full" value="45" required>
                </div>
                <div>
                    <label class="form-label">Berat</label>
                    <input type="number" name="berat" class="form-input w-full" value="45" required>
                </div>
            </div>

            <div>
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-input w-full h-20 resize-none" required>Vas bambu dengan desain minimalis.</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Gambar Produk</label>

                <!-- Current Image Preview -->
                <div id="currentImagePreview" class="mb-3 flex items-center space-x-3">
                    <div class="w-24 h-24 rounded-md overflow-hidden border">
                        <img id="current-image" src="" alt="Current Product" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Upload Area -->
                <div id="uploadArea-edit"
                    class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-gray-400 transition-colors">
                    <div id="uploadContent-edit">
                        <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                        <p class="text-gray-500 text-sm">Drag & drop atau <span class="text-blue-500">klik untuk
                                browse</span></p>
                    </div>
                </div>
                <input type="file" id="fileInput-edit" class="hidden" accept="image/*">

                <!-- Cropper Section -->
                <div id="cropperSection-edit" class="hidden mt-4">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-lg font-medium">Crop Gambar</h4>
                        <div class="flex space-x-2">
                            <button type="button" id="resetCrop-edit" class="btn-warning text-sm px-3 py-1">
                                <i class="fas fa-undo mr-1"></i>Reset
                            </button>
                            <button type="button" id="cropImage-edit" class="btn-success text-sm px-3 py-1">
                                <i class="fas fa-crop mr-1"></i>Crop
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <!-- Cropper Container -->
                        <div class="lg:col-span-2">
                            <div id="cropperContainer">
                                <img id="cropperImage-edit" class="w-full" src="" alt="Image to crop">
                            </div>
                        </div>

                        <!-- Preview dan Controls -->
                        <div class="space-y-4">
                            <div>
                                <h5 class="text-sm font-medium mb-2">Preview</h5>
                                <div id="cropPreview-edit"
                                    class="w-32 h-32 mx-auto border border-gray-300 rounded overflow-hidden bg-gray-50">
                                </div>
                            </div>

                            <div>
                                <h5 class="text-sm font-medium mb-2">Zoom</h5>
                                <input type="range" id="zoomRange-edit" min="0.1" max="3" step="0.1"
                                    value="1" class="w-full">
                            </div>

                            <div class="flex space-x-1">
                                <button type="button" id="flipHorizontal-edit"
                                    class="btn-secondary text-xs px-2 py-1">
                                    <i class="fas fa-arrows-alt-h"></i>
                                </button>
                                <button type="button" id="flipVertical-edit"
                                    class="btn-secondary text-xs px-2 py-1">
                                    <i class="fas fa-arrows-alt-v"></i>
                                </button>
                            </div>
                            <div class="flex space-x-1">
                                <button type="button" id="rotateLeft-edit" class="btn-secondary text-xs px-2 py-1">
                                    <i class="fas fa-rotate-left"></i>
                                </button>
                                <button type="button" id="rotateRight-edit" class="btn-secondary text-xs px-2 py-1">
                                    <i class="fas fa-rotate-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Final Preview -->
                <div id="finalPreview-edit" class="hidden mt-4">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-lg font-medium">Gambar Final</h4>
                        <button type="button" id="crop-edit" class="btn-warning text-sm px-3 py-1">
                            <i class="fas fa-edit mr-1"></i>Edit Crop
                        </button>
                    </div>
                    <div class="flex items-center space-x-4">
                        <img id="finalImage-edit" class="cropped-preview rounded-lg" src=""
                            alt="Final cropped image">
                        <div class="text-sm text-gray-600 dark:text-gray-300">
                            <p id="finalImageName-edit"></p>
                            <p id="finalImageSize-edit"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="closeModal('editModal')"
                    class="btn-secondary px-4 py-2 text-sm">Batal</button>
                <button type="submit" class="btn-accent px-4 py-2 text-sm">
                    <i class="fas fa-save mr-1"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>
