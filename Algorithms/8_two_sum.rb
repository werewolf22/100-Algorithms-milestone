nums = [2, 7, 11, 15,2,4,5]
target =9
j=nums.size-1
for i in 0..j
  k=i+1
  for l in k..j
    if nums[i]+nums[l] == target
      puts "#{i} ,#{l}"
    end
  end
end
