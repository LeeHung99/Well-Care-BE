<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValid extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'in_stock' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
            'sale' => 'nullable|integer|min:0|max:100',
            'symptom' => 'nullable|string|max:255',
            'origin' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'short_des' => 'required|string',
            'description' => 'required|string',
            'category' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'avatar_sub' => 'required',
            'obj' => 'required|exists:object,id_object',
            'sick' => 'required|exists:sick,id_sick',
            'hide' => 'required|boolean',
            'hot' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm.',
            'price.required' => 'Bạn chưa nhập giá sản phẩm.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá trị nhỏ nhất phải bằng 0',
            'in_stock.required' => 'Bạn chưa nhập số lượng tồn kho.',
            'in_stock.integer' => 'Giá trị không hợp lệ.',
            'brand.required' => 'Bạn chưa nhập thương hiệu.',
            'sale.integer' => 'Giá trị không hợp lệ.', 
            'sale.min' => 'Phần trăm giảm giá không hợp lệ.', 
            'sale.max' => 'Phần trăm giảm giá không hợp lệ.', 
            'symptom.max' => 'Quá giới hạn ký tự.', 
            'origin.required' => 'Bạn chưa nhập xuất xứ.',  
            'origin.max' => 'Quá giới hạn ký tự.', 
            'unit.required' => 'Bạn chưa nhập dạng thuốc.', 
            'unit.max' => 'Quá giới hạn ký tự.', 
            'short_des.required' => 'Bạn chưa nhập mô tả ngắn.',
            'description.required' => 'Bạn chưa nhập mô tả sản phẩm.',
            'category.required' => 'Bạn chưa chọn danh mục.',
            // 'category.exists' => 'Danh mục không hợp lệ.',
            'avatar.required' => 'Bạn chưa chọn hình ảnh.',
            'avatar.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'avatar.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, webp.',
            'avatar.max' => 'Hình ảnh không được vượt quá 2MB.',

            'avatar_sub.required' => 'Bạn chưa chọn hình ảnh.',
            // 'avatar_sub.image' => 'Hình ảnh phụ phải là tệp hình ảnh.',
            // 'avatar_sub.mimes' => 'Hình ảnh phụ phải có định dạng jpeg, png, jpg, gif, webp.',
            // 'avatar_sub.max' => 'Hình ảnh phụ không được vượt quá 2MB.',
            'obj.required' => 'Bạn chưa chọn đối tượng sử dụng.',
            'obj.exists' => 'Đối tượng sử dụng không hợp lệ.',
            'sick.required' => 'Bạn chưa chọn bệnh.',
            'sick.exists' => 'Bệnh không hợp lệ.',
            'hide.required' => 'Bạn chưa chọn trạng thái ẩn/hiện.',
            'hide.boolean' => 'Trạng thái ẩn/hiện không hợp lệ.',
            'hot.required' => 'Bạn chưa chọn trạng thái nổi bật.',
            'hot.boolean' => 'Trạng thái nổi bật không hợp lệ.',
        ];
    }
}
