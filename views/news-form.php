<div class="form-group">
                        <label for="author" class="form-label">Autor</label>
                        <input type="text" name="author" value="<?= $news?->getAuthor() ?? ''; ?>" class="form-control" required placeholder="Digite o autor" id="author">
                        <div class="invalid-feedback">
                            Por favor, insira o autor.
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">Selecione uma categoria</option>
                                <option value="politica" <?= isset($news) && $news->getCategory() === 'politica' ? 'selected' : ''; ?>>Política</option>
                                <option value="esportes" <?= isset($news) && $news->getCategory() === 'esportes' ? 'selected' : ''; ?>>Esportes</option>
                                <option value="tecnologia" <?= isset($news) && $news->getCategory() === 'tecnologia' ? 'selected' : ''; ?>>Tecnologia</option>
                                <option value="entretenimento" <?= isset($news) && $news->getCategory() === 'entretenimento' ? 'selected' : ''; ?>>Entretenimento</option>
                                <option value="Saude" <?= isset($news) && $news->getCategory() === 'saude' ? 'selected' : ''; ?>>Saúde</option>
                                <option value="viagem" <?= isset($news) && $news->getCategory() === 'viagem' ? 'selected' : ''; ?>>Viagens</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, selecione uma categoria.alte
                            </div>
                        </div>
<!--testes-->
                    </div>
                    <button type="submit" class="btn btn-primary btn-round">Enviar</button>
                </form>
            </div>
        </main>
    </div>

    <?php

    require_once _DIR_ . '/fim-html.php';
