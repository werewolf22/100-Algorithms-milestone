def my_flatten(arr)
  result = []

  arr.each do |el|
    if el.is_a?(Array)
      result.concat(my_flatten(el))
    else
      result << el
    end
  end

  result
end
