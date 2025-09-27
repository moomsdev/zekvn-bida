jQuery(document).ready(function($) {
    let searchTimeout;
    const searchInput = $('.search-custom input[type="search"]');
    const searchContainer = $('.search-custom');
    
    // Tạo container cho kết quả tìm kiếm
    if (!$('.search-results').length) {
        searchContainer.append('<div class="search-results"></div>');
    }
    
    const searchResults = $('.search-results');
    
    // Xử lý khi người dùng nhập từ khóa
    searchInput.on('input', function() {
        const searchTerm = $(this).val().trim();
        
        // Xóa timeout cũ nếu có
        clearTimeout(searchTimeout);
        
        if (searchTerm.length < 2) {
            searchResults.hide().empty();
            return;
        }
        
        // Delay 300ms để tránh gửi quá nhiều request
        searchTimeout = setTimeout(function() {
            performAjaxSearch(searchTerm);
        }, 300);
    });
    
    // Ẩn kết quả khi click ra ngoài
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search').length) {
            searchResults.hide();
        }
    });
    
    // Hiển thị kết quả khi focus vào input
    searchInput.on('focus', function() {
        if (searchResults.children().length > 0) {
            searchResults.show();
        }
    });
    
    // Xử lý khi nhấn Enter
    searchInput.on('keypress', function(e) {
        if (e.which === 13) {
            const searchTerm = $(this).val().trim();
            if (searchTerm.length >= 2) {
                window.location.href = '/?s=' + encodeURIComponent(searchTerm);
            }
        }
    });
    
    function performAjaxSearch(searchTerm) {
        // Hiển thị loading
        searchResults.html('<div class="search-loading"><i class="fas fa-spinner fa-spin"></i> Đang tìm kiếm...</div>').show();
        
        $.ajax({
            url: ajax_search_object.ajax_url,
            type: 'POST',
            data: {
                action: 'ajax_search',
                search_term: searchTerm,
                nonce: ajax_search_object.nonce
            },
            success: function(response) {
                if (response.success && response.data.length > 0) {
                    displaySearchResults(response.data, searchTerm);
                } else {
                    searchResults.html('<div class="no-results">Không tìm thấy kết quả nào cho "' + searchTerm + '"</div>').show();
                }
            },
            error: function() {
                searchResults.html('<div class="search-error">Có lỗi xảy ra khi tìm kiếm. Vui lòng thử lại.</div>').show();
            }
        });
    }
    
    function displaySearchResults(results, searchTerm) {
        let html = '<div class="search-results-list">';
        
        results.forEach(function(result) {
            const thumbnail = result.thumbnail || 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjYwIiBoZWlnaHQ9IjYwIiBmaWxsPSIjRjVGNUY1Ii8+CjxwYXRoIGQ9Ik0yMCAyMEg0MFY0MEgyMFYyMFoiIGZpbGw9IiNEOUQ5RDkiLz4KPHBhdGggZD0iTTI1IDI1SDM1VjM1SDI1VjI1WiIgZmlsbD0iI0NDQ0NDQyIvPgo8L3N2Zz4K';
            const highlightedTitle = highlightSearchTerm(result.title, searchTerm);
            const highlightedExcerpt = highlightSearchTerm(result.excerpt, searchTerm);
            
            html += `
                <div class="search-result-item">
                    <div class="result-thumbnail">
                        <img src="${thumbnail}" alt="${result.title}" loading="lazy">
                    </div>
                    <div class="result-content">
                        <h4 class="result-title">
                            <a href="${result.permalink}">${highlightedTitle}</a>
                        </h4>
                        <p class="result-excerpt">${highlightedExcerpt}</p>
                        <div class="result-meta">
                            <span class="result-date">${result.date}</span>
                            <span class="result-views">${result.views} lượt xem</span>
                        </div>
                    </div>
                </div>
            `;
        });
        
        html += '</div>';
        html += `<div class="search-more"><a href="/?s=${encodeURIComponent(searchTerm)}">Xem tất cả kết quả cho "${searchTerm}"</a></div>`;
        
        searchResults.html(html).show();
    }
    
    function highlightSearchTerm(text, term) {
        if (!term) return text;
        
        const regex = new RegExp(`(${term})`, 'gi');
        return text.replace(regex, '<mark>$1</mark>');
    }
});
