document.addEventListener('DOMContentLoaded', function () {
    loadProvinces();
});

function loadProvinces() {
    // Fetch provinces
    fetch('https://provinces.open-api.vn/api/')
        .then(response => response.json())
        .then(json => {
            // Get the select element
            const provinceSelect = document.getElementById('provinceSelect');

            // Add options to the province select
            json.forEach(province => {
                const option = document.createElement('option');
                option.value = province.code;
                option.text = province.name;
                provinceSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching provinces:', error));
}

function loadDistricts() {
    // Lấy phần tử select của tỉnh
    const provinceSelect = document.getElementById('provinceSelect');

    // Kiểm tra xem provinceSelect có tồn tại và có lựa chọn nào được chọn không
    if (provinceSelect && provinceSelect.selectedIndex >= 0) {
        // Lấy phần tử option đã chọn
        const selectedOption = provinceSelect.options[provinceSelect.selectedIndex];

        // Kiểm tra xem selectedOption có tồn tại không
        if (selectedOption) {
            // Lấy ID của tỉnh đã chọn từ giá trị của option
            const selectedProvinceId = selectedOption.value;

            // Gọi API để lấy thông tin về quận huyện của tỉnh đã chọn
            fetch(`https://provinces.open-api.vn/api/p/${selectedProvinceId}?depth=2`)
                .then(response => response.json())
                .then(json => {
                    console.log(selectedOption);
                    // Lấy phần tử select của quận huyện
                    const districtSelect = document.getElementById('districtSelect');

                    // Xóa tất cả các lựa chọn hiện tại
                    districtSelect.innerHTML = '';

                    // Kiểm tra xem thuộc tính 'districts' có tồn tại trong JSON không
                    if (json.districts && json.districts.length > 0) {
                        // Thêm các lựa chọn vào phần tử select của quận huyện
                        json.districts.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.id;
                            option.text = district.name;
                            districtSelect.appendChild(option);
                        });
                    } else {
                        // Nếu không có quận huyện nào, thêm một lựa chọn mặc định
                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.text = 'Không có quận huyện';
                        districtSelect.appendChild(defaultOption);
                    }
                })
                .catch(error => console.error('Lỗi khi lấy thông tin quận huyện:', error));
        }
    }
}

function combineAndAlert() {
    // Lấy giá trị ID của tỉnh
    const provinceSelect = document.getElementById('provinceSelect');
    const provinceId = provinceSelect ? provinceSelect.value : null;

    // Lấy nội dung (text) của tỉnh được chọn
    const provinceText = provinceSelect && provinceSelect.selectedIndex >= 0
        ? provinceSelect.options[provinceSelect.selectedIndex].textContent
        : '';

    // Lấy giá trị ID của quận/huyện
    const districtSelect = document.getElementById('districtSelect');
    const districtId = districtSelect ? districtSelect.value : null;

    // Lấy nội dung (text) của quận/huyện được chọn
    const districtText = districtSelect && districtSelect.selectedIndex >= 0
        ? districtSelect.options[districtSelect.selectedIndex].textContent
        : '';

    // Kết hợp nội dung của tỉnh và quận/huyện thành một chuỗi
    const combinedString = provinceText + ', ' + districtText;

    // Alert kết quả
    alert('Combined Data: ' + combinedString);
}
