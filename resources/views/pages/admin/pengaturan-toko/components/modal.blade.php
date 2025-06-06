    <!-- Modal Tambah/Edit Metode Pembayaran -->
    <div id="paymentModal" class="modal fixed inset-0 z-50 hidden bg-grey/80 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen py-4 px-4">
            <div class="modal-content w-full max-w-xl py-4 px-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold" id="modal-title">Tambah Metode Pembayaran</h3>
                    <button onclick="closeModal('paymentModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="payment-form" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Nama Bank/E-Wallet</label>
                            <input type="text" name="nama_bank" class="form-input w-full"
                                placeholder="Contoh: Bank Mandiri" required>
                        </div>
                        <div>
                            <label class="form-label">Jenis</label>
                            <select name="jenis" class="form-input w-full" required>
                                <option value="">Pilih Jenis</option>
                                <option value="bank">Bank</option>
                                <option value="e-wallet">E-Wallet</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Nomor Akun</label>
                            <input type="text" name="no_akun" class="form-input w-full"
                                placeholder="Nomor rekening/telepon" required>
                        </div>
                        <div>
                            <label class="form-label">Nama Akun</label>
                            <input type="text" name="nama_akun" class="form-input w-full"
                                placeholder="Nama pemilik akun" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Logo Bank</label>

                        <!-- Current Image Preview -->
                        <div id="currentImagePreview" class="mb-3 flex items-center space-x-3">
                            <div class="w-24 h-24 rounded-md overflow-hidden border">
                                <img id="current-image" src="" alt="Current Product"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Upload Area -->
                        <div id="uploadArea-add"
                            class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-gray-400 transition-colors">
                            <div id="uploadContent-add">
                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                                <p class="text-gray-500 text-sm">Drag & drop atau <span class="text-blue-500">klik untuk
                                        browse</span></p>
                            </div>
                        </div>
                        <input type="file" id="fileInput-add" class="hidden" accept="image/*">

                        <!-- Cropper Section -->
                        <div id="cropperSection-add" class="hidden mt-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-lg font-medium">Crop Gambar</h4>
                                <div class="flex space-x-2">
                                    <button type="button" id="resetCrop-add" class="btn-warning text-sm px-3 py-1">
                                        <i class="fas fa-undo mr-1"></i>Reset
                                    </button>
                                    <button type="button" id="cropImage-add" class="btn-success text-sm px-3 py-1">
                                        <i class="fas fa-crop mr-1"></i>Crop
                                    </button>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                                <!-- Cropper Container -->
                                <div class="lg:col-span-2">
                                    <div id="cropperContainer">
                                        <img id="cropperImage-add" class="w-full" src="" alt="Image to crop">
                                    </div>
                                </div>

                                <!-- Preview dan Controls -->
                                <div class="space-y-4">
                                    <div>
                                        <h5 class="text-sm font-medium mb-2">Preview</h5>
                                        <div id="cropPreview-add"
                                            class="w-32 h-32 mx-auto border border-gray-300 rounded overflow-hidden bg-gray-50">
                                        </div>
                                    </div>

                                    <div>
                                        <h5 class="text-sm font-medium mb-2">Zoom</h5>
                                        <input type="range" id="zoomRange-add" min="0.1" max="3"
                                            step="0.1" value="1" class="w-full">
                                    </div>

                                    <div class="flex space-x-1">
                                        <button type="button" id="flipHorizontal-add"
                                            class="btn-secondary text-xs px-2 py-1">
                                            <i class="fas fa-arrows-alt-h"></i>
                                        </button>
                                        <button type="button" id="flipVertical-add"
                                            class="btn-secondary text-xs px-2 py-1">
                                            <i class="fas fa-arrows-alt-v"></i>
                                        </button>
                                    </div>
                                    <div class="flex space-x-1">
                                        <button type="button" id="rotateLeft-add"
                                            class="btn-secondary text-xs px-2 py-1">
                                            <i class="fas fa-rotate-left"></i>
                                        </button>
                                        <button type="button" id="rotateRight-add"
                                            class="btn-secondary text-xs px-2 py-1">
                                            <i class="fas fa-rotate-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Final Preview -->
                        <div id="finalPreview-add" class="hidden mt-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-lg font-medium">Gambar Final</h4>
                                <button type="button" id="crop-add" class="btn-warning text-sm px-3 py-1">
                                    <i class="fas fa-add mr-1"></i>Edit Crop
                                </button>
                            </div>
                            <div class="flex items-center space-x-4">
                                <img id="finalImage-add" class="cropped-preview rounded-lg" src=""
                                    alt="Final cropped image">
                                <div class="text-sm text-gray-600 dark:text-gray-300">
                                    <p id="finalImageName-add"></p>
                                    <p id="finalImageSize-add"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closePaymentModal()"
                            class="btn-secondary px-4 py-2">Batal</button>
                        <button type="submit" class="btn-accent px-4 py-2">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
